$(document).ready(function() {
    // 1. Search Functionality
    $('.btn-custom').on('click', function() {
        let query = $('.search-input').val().trim();
        if(query) {
            alert('Searching for: ' + query);
            // In a real app, this would redirect: window.location.href = '/search?q=' + query;
        } else {
            $('.search-input').focus();
        }
    });

    $('.search-input').on('keypress', function(e) {
        if(e.which == 13) {
            $('.btn-custom').click();
        }
    });

    // 2. "Connect With Expert" Button
    $('.btn-connect').on('click', function() {
        $('html, body').animate({
            scrollTop: $("#contactDropdown").offset().top // For now, scroll to navbar contact or footer
        }, 800);
        // Or open a modal if one existed
        alert("Thanks for your interest! An expert will connect with you shortly.");
    });

    // 3. Smooth Scrolling for Anchor Links
    $('a[href^="#"]').on('click', function(event) {
        var target = $(this.getAttribute('href'));
        if(target.length) {
            event.preventDefault();
            $('html, body').stop().animate({
                scrollTop: target.offset().top - 100 // Offset for fixed navbar
            }, 1000);
        }
    });

    // 4. Navbar Background on Scroll
    $(window).scroll(function() {
        if ($(window).scrollTop() > 50) {
            $('.navbar').addClass('shadow-sm bg-white');
        } else {
            $('.navbar').removeClass('shadow-sm bg-white');
        }
    });
});
