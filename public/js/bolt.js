$(function(){
  console.log(`
                         %############                              ############%
                       #################&                         ################
                     ######         ######                       ######         ######
                    #####    #####%   #####                     #####   %#####    #####
                    ####   #########%  #####                   #####  %#########   ####
                   ####%    ###  ####   ####       @%%%@       ####   ####  ###    #####
                   #####        #####   ###########################   #####        #####
                    ####       #####   #############################   #####       ####
                    #####&   #####    #######                 #######    #####   ####
                      ##### #####   ######                       ######   ##### #####
                        #  ####%   #####          #                #####   %####  #
         #############    ####   #####            ##                 #####   ####    #############
       #######################   ####              ###                ####   #######################
     ######          ########   ####               ####                ####   ########          ######
    #####    ######    ######  #####                #####              #####  ######    ######    #####
    ####   ##########   ####   ####                  #####              ####   ####   ##########   ####
    ####  #####  ####   ####   ####            #############            ####   ####   ####  #####  ####
    ####   ###   ####   ####   ####             ############            ####   ####   ####   ###   ####
    ####         #####  ####   ####      ###     ######        ###      ####   ####  #####         ####
     #####        ####   ####   ####    #######    ####     #######    ####   ####   ####        #####
      ######%     ####   ####   #####      #####    /###   #####      #####   ####   ####     %######
        ###############   ####   #####      %####     ##  ####%      #####   ####   ###############
           ####### ####   #####   #####      ###       (#  ###      #####   #####   #### #######
                    ####   #####   ######                #        ######   #####   ####
                     ############    #####                       #####    ############
                  ###############   ####                       ####   ################&
                 ######        ##########                         ##########        ######
                #####    ####    #######                           #######    ####    #####
               ####   #########%                                           %#########   ####
               ####  ### #######                                       ####### ####&  ####
               ####  #####    #######                                 #######    #####  ####
               ####   ####%     #########                         #########     %####   ####
               #####               ############             ############               #####
                 #####         %####   #############################   ####%         #####
                  ##################         #################         ##################
                     ############   Bolt.Sniddl.com Loaded Successfully   ############
    `);

  $('.col-md-6').fadeIn("slow");
  window.code = $('#code');
  window.num = $('#number');

  code.bind('input', function(){
    str = $.trim( $(this).val() )
    len = $(this).val().length;
    error = $('#code-span');
    if (len == 6){
      var regx = /^[A-Za-z0-9]+$/;
      if ( regx.test(str) ){
          error.html('Good!');
          error.css('color', '#4caf50')
          $(this).parent().find('#code-label').removeClass('error')
          $(this).removeClass('error')
          $(this).parent().find('#code-label').addClass('success')
          $(this).addClass('success')
      }else{
        error.html('Numbers and Letters Only');
        error.css('color', '#df0000')
        $(this).parent().find('#code-label').removeClass('success')
        $(this).removeClass('success')
        $(this).parent().find('#code-label').addClass('error')
        $(this).addClass('error')
      }
    }else{
      error.html('Must be 6 characters.');
      error.css('color', '#df0000')
      $(this).parent().find('#code-label').removeClass('success')
      $(this).removeClass('success')
      $(this).parent().find('#code-label').addClass('error')
      $(this).addClass('error')
    }
  })



  num.bind('input', function(){
    str = $.trim( $(this).val() )
    len = $(this).val().length;
    error = $('#num-span');
    if (len > 0){
      error.html('Good!');
      error.css('color', '#4caf50')
      $(this).parent().find('#num-label').addClass('success')
      $(this).addClass('success')}
  })

  if (code.val().length > 0 || num.val().length > 0){
    code.trigger('input');
    num.trigger('input');
  }

  $('enable_adv_label').click(function(){
    $('.advanced').toggle();
  })

});
