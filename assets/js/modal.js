 class Modal {
    /**
     * @param {HTMLElement} element
     * @param {Object} options
     *  @param {string} titre
     *  @param {string} type
     *  @param {string} pseudonyme
     *  @param {string} motDePasse
     *  @param {string} confirmation
    **/
    constructor(element, options) {
        this.element = element;
        this.options = {
            class: options.class,
            titre: options.titre,
            type: options.type,
            pseudonyme: options.pseudonyme,
            motDePasse: options.motDePasse,
            confirmation: options.confirmation,
            modalOverlay: options.modalOverlay
        }
        this.createModal();
    }
        createModal() {
            this.modal = $('<div/>').appendTo(this.element);
            let modalClass = this.options.class;
            this.modal.addClass(modalClass);
            this.modal.hide();
            let modalClose = $('<img class="modalClose" src = "assets/images/close.svg"/>').appendTo(this.modal);

            //TITRE
            let titreModal = $('<h3 />').appendTo(this.modal);
            $(titreModal).addClass(modalClass + '-title');
            $(titreModal).text(this.options.titre);

            if(this.options.type == 'connexion'){
                    //PSEUDONYME
                    let iconePseudonyme = $('<i class="fa fa-user" aria-hidden="true"></i>').appendTo(this.modal);
                    let inputPseudo = $('<input type="text" name="username" placeholder="pseudonyme" id="username" class="form-control validate" required>').appendTo(this.modal);
                    this.options.pseudonyme = inputPseudo;
                    let labelPseudo = $('<label for="username"></label>').appendTo(this.modal);
                    $(labelPseudo).addClass(modalClass + '-lblpseudo');
            
                    //MOT DE PASSE
                    let iconeMdp = $('<i class="fa fa-unlock-alt" aria-hidden="true"></i>').appendTo(this.modal);
                    let inputMotDePasse = $('<input type="password" name="password" placeholder="mot de passe" id="password" class="form-control validate" required>').appendTo(this.modal);
                    this.options.motDePasse = inputMotDePasse;
                    let labelMotDePasse = $('<label for="username"></label>').appendTo(this.modal);
                    $(labelMotDePasse).addClass(modalClass + '-lblMdp');

                    //CREATION DIV et Button de modal, si local et session storage sont supporté on sauvegarde nom et prenom en local
                    let modalBtn = $('<div/>').appendTo(this.modal);
                    $(modalBtn).addClass(modalClass+'Buttons')
                    let validBtn = $('<button type="button">Valider</button>').appendTo($(modalBtn));
                    $(validBtn).addClass(modalClass + '-btn');
                    $(validBtn).on('click', function () {
                        console.log(inputPseudo.val());
                        console.log(inputMotDePasse.val());
                        localStorage.setItem("name5", inputPseudo.val()); //savgrd le pseudo
                        localStorage.setItem("mdp5", inputMotDePasse.val()); //savgrd le mdp
                    })
                    let annulBtn = $('<button type="button" class="annul-btn">Annuler</button>').appendTo($(modalBtn));
                    $(annulBtn).on('click', function () {
                        $('.'+modalClass).hide();
                    })
                
                    // au chargement de la page si local et session storage sont supporté on recupere nom et prenom
                    $(window).on('load', function() {
                    let userName = localStorage.getItem("name5"); //récup nom
                    let userPass = localStorage.getItem("mdp5"); //récup prenom
                    $(inputPseudo).val(userName);
                    $(inputMotDePasse).val(userPass);
                    })
            }


            if(this.options.type == 'confirmation') {
                let confirmMessage = $('<div class="confirmMessage" >'+this.options.confirmation+'</div>').appendTo(this.modal);
            }


            
            // Si option overlay choisie creation de l'element Overlay
            if(this.options.modalOverlay === true) {
                let mapOverlay = $('<div class="mapOverlay"/>').appendTo(this.element);
            }
        } 
}





