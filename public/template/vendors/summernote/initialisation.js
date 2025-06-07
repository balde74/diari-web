jQuery(function($) {
$('.summernote').summernote({
           // unfortunately you can only rewrite
           // all the toolbar contents, on the bright side
           // you can place uploadcare button wherever you want
           lang: 'fr-FR', // default: 'en-US'
           height: 500,                 // set editor height
           minHeight: null,             // set minimum height of editor
           maxHeight: null,             // set maximum height of editor
           // focus: true, 
           toolbar: [
            //  ['uploadcare', ['uploadcare']], // here, for example
             ['style', ['style']],
             ['font', ['bold', 'italic', 'underline', 'clear']],
             ['fontname', ['fontname']],
             ['color', ['color']],
             ['para', ['ul', 'ol', 'paragraph']],
             ['height', ['height']],
             ['table', ['table']],
             ['insert', ['media', 'link','hr', 'picture']],
            ['view', ['fullscreen']],
            //['view', ['codeview']]
             ['help', ['help']],
             ['custom', ['emoji']], 
           ],
           fontSizes: ['12', '16', '18', '20', '25'],
           callbacks: {
            onInit: function () {
              // Définir la taille de police par défaut
              $(this).summernote('fontSize', 16);
            }
          },
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

           buttons: {
            emoji: function(context) {
              var ui = $.summernote.ui;
    
              // Crée le bouton emoji
              var button = ui.button({
                contents: '<i class="fa fa-smile-o"></i>',
                tooltip: 'Insérer un emoji',
                click: function () {
                  const picker = new EmojiButton({
                    position: 'bottom-start'
                  });
    
                  picker.on('emoji', emoji => {
                    context.invoke('editor.insertText', emoji);
                  });
    
                  picker.togglePicker(button.render()[0]);
                }
              });
    
              return button.render(); // retourne le bouton
            }}
         });
})