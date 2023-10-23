/**
 * @property {HTMLElement} element
 */
  class lightbox {
    static init(){
      const links = document.querySelectorAll(
        'a[href$=".png"], a[href$=".jpg"], a[href$=".jpeg"]');
      links.forEach(link => link.addEventListener ('click', e =>{
        e.preventDefault ();
        new lightbox(e.currentTarget.getAttribute('href')
)
      }))
    }

    /**
     * @param {string} url URL de l'image 
     * 
     */
    constructor (url){
      this.element= this.buildDOM(url);
      this.onKeyUp = this.onKeyUp.bind(this);
      this.loadImage(url);
      document.body.appendChild(this.element);
      document.addEventListener('keyup', this.onKeyUp);
    }

    loadImage (url) {
      const image = new Image ();
      const container = this.element.querySelector
      ('lightbox__container');
      const loader = document.createElement('div');
      loader.classList.add('lightbox__container');
      container.appendChild(loader);
      image.onload = () => {
      container.removeChild(loader)
      container.appendChild(image)

      };

      image.src  = url;
    }

  /** Ferme la lightbox en faisant echap au clavier
     * @param {KeyboardEvent} e
     * 
     */ 
    onKeyUp (e){
      if (e.key === 'Escape'){
      this.close(e);

    }
  }
    /** Ferme la lightbox au click sur la croix
     * @param {MouseEvent} e
     * 
     */ 

    close(e) {
      e.preventDefault ();
      this.element.classList.add('fadeOut');
      window.setTimeout(() => {
        this.elementnt.parentElement.removeChild(this.element);
      }, 500);
      document.removeEventListener('keyup', this.onKeyUp);
    }

    /**
     * @param {string} url URL de l'image 
     * @return {HTMLElement}
     */
    buildDOM(url){
      const dom = document.createElement('div');
      dom.classList.add('lightbox');
      dom.innerHTML = 
      <button class="lightbox__close">Fermer</button>
      <button class="lightbox__next">Suivant</button>
      <button class="lightbox__prev">Précédent</button>
      <div class="lightbox__container">
      <div class="photo1"></div>
    
      </div>;

      dom.querySelector('lightbox__close').addEventListener('click',
      this.close.bind(this) )
      return dom;
   }

  }

  
lightbox.init();