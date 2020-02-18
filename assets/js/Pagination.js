class Pagination {
    /**
     * @param {HTMLElement} element
     * @param {Object} options
     *  @param {string} id
     *  @param {string} urlAjax
     * @param {int} pageNav
    **/
    constructor(element, options) {
        this.element = element;
        this.options = {
            id: options.id,
            urlAjax: options.urlAjax,
            pageNav: options.pageNav
        };
        
        this.paginationAjax();
    }

        paginationAjax(){
            $.post({
                url: this.options.urlAjax,
                data:{'action': 'pagination', 'page': 2},
                success: (data) =>{
                    pagination = JSON.parse(data);
                    let adminPage = parseInt(pagination.page);
                    let adminMaxPages = pagination.maxPages;
                    console.log('adminPage ='+adminPage)
                    console.log('adminMaxPages ='+adminMaxPages)
                    this.paginate(adminPage, adminMaxPages);
                }
            })
        }

        paginate(adminPage, adminMaxPages) {
           
            let paginationId = this.options.id;
            
            this.pagination = $('<nav aria-label="Page navigation '+paginationId+'"></nav>').appendTo(this.element);  
            this.pagination.attr('id', paginationId);
            this.paginationUl = $('<ul class="paginationUl"></ul>').appendTo(this.pagination);
            this.paginationPrev = $('<li class="page-item"><button class="'+paginationId+' page-link prev">Previous</button></li>').appendTo(this.paginationUl); 
            
            /*for(let i = adminPage - adminPageNav; i < adminPage; i++){
                if(i> 0){
                
                 this.leftPageNav= $('<li class="page-item"><a class="'+paginationId+' page-link" value='+i+'>' +i+ '</a></li>').appendTo(this.paginationUl);
                }
               
            }*/
            console.log(adminPage + 1);
            this.currentPage= $('<li class="page-item"><p class=" '+paginationId+' page-link active" value="'+adminPage+'">'+adminPage+'</p></li>').appendTo(this.paginationUl);
            /*for(let j = adminPage +1; j <= adminMaxPages; j++){
                this.rightPageNav= $('<li class="page-item"><a class=" '+paginationId+' page-link" value='+j+'>'+j+'</a></li>').appendTo(this.paginationUl);
                
                if(j >= adminPage + adminPageNav){
                break;
                }
            } */
       
            this.paginationNext = $('<li class="page-item"><button class=" '+paginationId+' page-link next">Next</button></li>').appendTo(this.paginationUl);
            this.paginationNext.on('click', function() {
                console.log('test Next')
                currentPageValue++;
            }); 
            
            $('.page-link.prev').on('click', function() {
                console.log('test Prev')   
                currentPageValue--;
            });  

            let currentPageValue = $('.page-link.active').attr('value');

            $(currentPageValue).on('change', function(){
                $('.page-link.active').text(currentPageValue);
                if($(currentPageValue) <= 1 ){
                    this.paginationPrev.hide();
                }else {
                    this.paginationPrev.show();
                }
                if($(currentPageValue)>= adminMaxPages){
                    this.paginationNext.hide();
                } else {
                    this.paginationNext.show();
                }
            })  

          /* $('.'+paginationId+'.page-link').on('click', function(){
                let num = $(this).attr('value');
                console.log('admin?page='+num);
                $('#tbodyBillet').load('admin?page='+num, function(){
                    $(this).hide()
                }); 
            }); 
         */
        } 
     

       
}
