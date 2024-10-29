window.addEventListener('load', () => {
    const mainImage = document.getElementById('main-image')
    const sideImage = document.getElementsByClassName('side-image')
    const mainImageSkeleton = document.getElementById('main-skeleton')
    const sideImageSkeleton = document.getElementsByClassName('side-image-skeleton')

    const mainTopic = document.getElementById('main-topic')
    const topic = document.getElementsByClassName('topic')
    const mainTopicSkeleton = document.getElementById('main-topic-skeleton')
    const topicSkeleton = document.getElementsByClassName('topic-skeleton')

    const advertise = document.getElementsByClassName('ad-banner')

    // From hide to show
    for(var i=0; i<sideImage.length; i++) {
        sideImage[i].setAttribute("style","")
    }
    for(var k=0; k<topic.length; k++) {
        topic[k].setAttribute("style","")
    }
    mainImage.setAttribute("style","")
    mainTopic.setAttribute("style","")

    advertise.setAttribute("style","")

    // From show to hide (skeleton)
    for(var j=0; j<sideImageSkeleton.length; j++) {
        sideImageSkeleton[j].style.cssText = "display: none"
    }
    for(var l=0; l<topicSkeleton.length; l++) {
        topicSkeleton[l].style.cssText = "display: none"
    }
    mainImageSkeleton.style.cssText = "display: none"
    mainTopicSkeleton.style.cssText = "display: none"

    var fading = document.createElement('div')
    fading.setAttribute('class','w-100 h-100 fading')
    fading.setAttribute('style','position: absolute; content: \"\"; left: 0; top: 0px')
    document.querySelector('#parallax img').before(fading)
});