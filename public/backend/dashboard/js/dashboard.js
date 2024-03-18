function toggle_profile_subnav(){
    var avatar_icon = document.querySelector('.avatar-profile');
    var profile_toggle = document.querySelector('.sub-nav-profile');
    
    avatar_icon.addEventListener('click', function () { 
        profile_toggle.classList.toggle('active');
    });

    window.addEventListener('click', function(e){
        if(!avatar_icon.contains(e.target)){
            profile_toggle.classList.remove('active')
        }
    })
}
toggle_profile_subnav()