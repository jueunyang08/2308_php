// 메인 로고 이미지
for(let i=0; i<=15; i++) {
    const C1 = document.querySelector('#category'+(i+1));
    const img = "/img/category_img_"+i+".png";
    C1.setAttribute('src',img);
}
var container = document.getElementById('map');
var options = {
		center: new kakao.maps.LatLng(33.450701, 126.570667),
		level: 3
	};

var map = new kakao.maps.Map(container, options);
// topic 상단 이미지

// const AD = document.querySelector('#adwrapimg');
// const url_topicimg = '/img/web_banner_01.png';
// TIMG.setAttribute('src', url_topicimg);



