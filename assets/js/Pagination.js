/*class Pagination {
    /**
     * @param {HTMLElement} element
     * @param {Object} options
     *  @param {string} id
     *  @param {string} urlAjax
     * @param {int} page
     * @param {int} pageNav

    constructor(element, options) {
        this.element = element;
        this.options = {
            id: options.id,
            urlAjax: options.urlAjax,
            page: options.page,
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
            /*
            this.pagination = $('<nav aria-label="Page navigation '+paginationId+'"></nav>').appendTo(this.element);  
            this.pagination.attr('id', paginationId);
            this.paginationUl = $('<ul class="paginationUl"></ul>').appendTo(this.pagination);
            let page = this.options.page;
            this.paginationPrev = $('<li class="page-item"><button class="'+paginationId+' page-link prev">Previous</button></li>').appendTo(this.paginationUl); 
            /*this.paginationPrev.on('click', ()=>{
                page--;
                console.log('prev : '+page)
            })*/
            /*for(let i = page - this.options.pageNav; i < page; i++){
                if(i> 0){
                
                 this.leftPageNav= $('<li class="page-item"><a class="'+paginationId+' page-link but" value='+i+'>' +i+ '</a></li>').appendTo(this.paginationUl);
                }   
            }*/

//            this.currentPage= $('<li class="page-item current"><p class=" '+paginationId+' page-link active" value="'+page+'">'+page+'</p></li>').appendTo(this.paginationUl);
            
            /*
            for(let j = page +1; j <= adminMaxPages; j++){
                this.rightPageNav= $('<li class="page-item"><a class=" '+paginationId+' page-link but" value='+j+'>'+j+'</a></li>').appendTo(this.paginationUl);
                
                if(j >= page + this.options.pageNav){
                break;
                }
            }*/
            

            /*let currentPageValue = $('.page-link.active').attr('value');
            let pageValueInt = parseInt(currentPageValue);
            console.log(pageValueInt + 1)*/
          
            //this.paginationNext = $('<li class="page-item"><button class=" '+paginationId+' page-link next">Next</button></li>').appendTo(this.paginationUl);
            /*
            $('.'+paginationId+'.page-link.next').on('click', ()=>{
                page++;
                console.log('next'+page)    
            })*/
            /*
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
            })
        }
           
      
}
*/