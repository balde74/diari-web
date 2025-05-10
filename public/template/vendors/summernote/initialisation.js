jQuery(function($) {
$('.summernote').summernote({
           // unfortunately you can only rewrite
           // all the toolbar contents, on the bright side
           // you can place uploadcare button wherever you want
           lang: 'fr-FR', // default: 'en-US'
           height: 150,                 // set editor height
           minHeight: null,             // set minimum height of editor
           maxHeight: null,             // set maximum height of editor
           // focus: true, 
           toolbar: [
             //['uploadcare', ['uploadcare']], // here, for example
             ['style', ['style']],
             ['font', ['bold', 'italic', 'underline', 'clear']],
             ['fontname', ['fontname']],
             ['color', ['color']],
             ['para', ['ul', 'ol', 'paragraph']],
             ['height', ['height']],
             ['table', ['table']],
             //['insert', ['media', 'link', 'hr', 'picture', 'video']],
             ['insert', ['link']],
            ['view', ['fullscreen', 'codeview']],
            //['view', ['codeview']]
             //['help', ['help']]
           ],
           fontSizes: ['12', '16', '18', '20', '25'],
           callbacks: {
            onInit: function () {
              // Définir la taille de police par défaut
              $(this).summernote('fontSize', 25);
            }
          }
          // uploadcare: {
             // button name (default is Uploadcare)
            // buttonLabel: 'Image / Fichier',
             // font-awesome icon name (you need to include font awesome on the page)
             //buttonIcon: 'picture-o',
             // text which will be shown in button tooltip
             //tooltipText: 'Télécharger fichiers, vidéos ou images',

             // uploadcare widget options,
             // see https://uploadcare.com/documentation/widget/#configuration
            // publicKey: '5935bd1b32a2ace0a22e', // set your API key
            // locale : 'fr',
            // crop: 'free',
            // tabs: 'all',
            // multiple: true
           //}
         });
})