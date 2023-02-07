const animator = document.querySelector(".animation_movie");

function animateAd(elements){
    for(element of elements){
        if(element.isIntersecting){
            element.target.classList.add("animate");
        }
        else{
            element.target.classList.remove("animate");
        }
    }
}

const options = {
    threshold: 1
};

const io = new IntersectionObserver(animateAd,options);

io.observe(animator);