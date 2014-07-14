var menuLeft = document.getElementById('cbp-spmenu-s1'),
                    showLeft = document.getElementById('showLeft'),
                    body = document.body;

            showLeft.onclick = function() {
                classie.toggle(this, 'active');
                classie.toggle(this, 'cerrar');
                classie.toggle(menuLeft, 'cbp-spmenu-open');
            };


            function disableOther(button) {
                if (button !== 'showLeft') {
                    classie.toggle(showLeft, 'disabled');
                }
                if (button !== 'showRight') {
                    classie.toggle(showRight, 'disabled');
                }
            }
             $(document).ready(function() {

                // Store variables

                var accordion_head = $('.accordion > li > a'),
                        accordion_body = $('.accordion li > .sub-menu');

                // Open the first tab on load

                accordion_head.first().addClass('active').next().slideDown('normal');

                // Click function

                accordion_head.on('click', function(event) {

                    // Disable header links

                    event.preventDefault();

                    // Show and hide the tabs on click

                    if ($(this).attr('class') != 'active') {
                        accordion_body.slideUp('normal');
                        $(this).next().stop(true, true).slideToggle('normal');
                        accordion_head.removeClass('active');
                        $(this).addClass('active');
                    }

                });

            });