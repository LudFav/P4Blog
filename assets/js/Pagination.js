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
                data:{'action': 'pagination'},
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
            let page = adminPage;
            this.paginationPrev = $('<li class="page-item"><button class="'+paginationId+' page-link prev">Previous</button></li>').appendTo(this.paginationUl); 
            this.paginationPrev.on('click', ()=>{
                page--;
                this.pageAjax(page);
                console.log('prev'+page)
            })
            for(let i = page - this.options.pageNav; i < page; i++){
                if(i> 0){
                
                 this.leftPageNav= $('<li class="page-item"><a class="'+paginationId+' page-link" value='+i+'>' +i+ '</a></li>').appendTo(this.paginationUl);
                }   
            }

            this.currentPage= $('<li class="page-item"><p class=" '+paginationId+' page-link active" value="'+page+'">'+page+'</p></li>').appendTo(this.paginationUl);

            for(let j = page +1; j <= adminMaxPages; j++){
                this.rightPageNav= $('<li class="page-item"><a class=" '+paginationId+' page-link" value='+j+'>'+j+'</a></li>').appendTo(this.paginationUl);
                
                if(j >= page + this.options.pageNav){
                break;
                }
            } 

            /*let currentPageValue = $('.page-link.active').attr('value');
            let pageValueInt = parseInt(currentPageValue);
            console.log(pageValueInt + 1)*/

            this.paginationNext = $('<li class="page-item"><button class=" '+paginationId+' page-link next">Next</button></li>').appendTo(this.paginationUl);
            $('.'+paginationId+'.page-link.next').on('click', ()=>{
                page++;
                console.log('next'+page)
                this.pageAjax(page);
            })
            
            $('.page-link.active').text(page);
            if(page <= 1 ){
                this.paginationPrev.hide();
            }else {
                this.paginationPrev.show();
            }
            if(page >= adminMaxPages){
                this.paginationNext.hide();
            } else {
                this.paginationNext.show();
            }

            /*$('.page-link.active').on('change', function(){
             console.log('change'+page)
             $('.page-link.active').text(page);
             if(page <= 1 ){
                 this.paginationPrev.hide();
             }else {
                 this.paginationPrev.show();
             }
             if(page >= adminMaxPages){
                 this.paginationNext.hide();
             } else {
                 this.paginationNext.show();
             }
            })*/  
        }

        pageAjax(page){
            console.log('pageAjax :'+page)
            $.post({
            url: this.options.urlAjax,
            data:{'action': 'pageAjax', 'page': page}
            })
        }
     
          
            
      
}
