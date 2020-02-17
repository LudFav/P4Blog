class Pagination {
    /**
     * @param {HTMLElement} element
     * @param {Object} options
     *  @param {string} id
     *  @param {int} page
     *  @param {int} maxPages
     * @param {int} pageNav
    **/
    constructor(element, options) {
        this.element = element;
        this.options = {
            id: options.id,
            page: options.page,
            maxPages: options.maxPages,
            pageNav: options.pageNav,
        };
        this.paginate();
    }
        paginate() {
            
            let paginationId = this.options.id;
            
            this.pagination = $('<nav aria-label="Page navigation '+paginationId+'"></nav>').appendTo(this.element);  
            this.pagination.attr('id', paginationId);
            this.paginationUl = $('<ul class="paginationUl" value="'+this.options.pageNav+'"></ul>').appendTo(this.pagination);
            this.paginationPrev = $('<li class="page-item"><button class="'+paginationId+' page-link prev">Previous</button></li>').appendTo(this.paginationUl); 

            /*for(let i = this.options.page - this.options.pageNav; i < this.options.page; i++){
                if(i> 0){
                
                 this.leftPageNav= $('<li class="page-item"><a class="'+paginationId+' page-link" value='+i+'>' +i+ '</a></li>').appendTo(this.paginationUl);
                }
               
            }*/
            this.currentPage= $('<li class="page-item"><p class=" '+paginationId+' page-link active" value="1"></p></li>').appendTo(this.paginationUl);
            /*for(let j = this.options.page +1; j <= this.options.maxPages; j++){
                this.rightPageNav= $('<li class="page-item"><a class=" '+paginationId+' page-link" value='+j+'>'+j+'</a></li>').appendTo(this.paginationUl);
                
                if(j >= this.options.page + this.options.pageNav){
                break;
                }
            } */
            this.paginationNext = $('<li class="page-item"><button class=" '+paginationId+' page-link next">Next</button></li>').appendTo(this.paginationUl);
               
        

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
