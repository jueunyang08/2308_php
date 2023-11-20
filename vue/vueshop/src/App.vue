<template>
  <img alt="Vue logo" src="./assets/logo.png">
  <!-- 헤더 -->
  <div class="nav">
    <!-- 반복문 -->
    <a v-for="(item, i) in navlist" :key="i">{{ i + ' : ' + item }}</a>
  </div>

  <!-- 모달 -->
  <Transition name="modalAni">
  <div class="bg_black" v-if="modalFlg">
    <div class="bg_white">
      <p class="close" @click="modalFlg = false">X</p>
      <img :src="products[key].img" alt=""/>
      <h4>{{products[key].name}}</h4>
      <p>{{products[key].price}} 원</p>
      <p>{{products[key].content}}</p>
      <p>허위 매물 신고 수 : {{products[key].reportCnt}}</p>
    </div>
  </div>
</Transition>
  <!-- 상품 리스트 -->
  <div>
    <div v-for="(item, i) in products" :key="i">
      <h4 @click="modalFlg = true; key = i">{{ item.name }}</h4>
      <p>{{ item.price }} 원</p>
      <button @click="plusOne(i)">허위 매물 신고</button>
      <span>신고수 : {{ item.reportCnt }} </span>
    </div>
      
      <!-- <h4 :style="sty_color_red">{{products[0]}}</h4>
      <p>{{prices[0]}} 원</p>
    </div>
    <div>
      <h4>{{products[1]}}</h4>
      <p>{{prices[1]}} 원</p>
    </div>
    <div>
      <h4>{{products[2]}}</h4>
      <p>{{prices[2]}} 원</p> -->
  </div>
</template>

<script>
import data from './assets/js/data.js';
document.ge


export default {
  name: 'App',
 
  // 데이터 바인딩 : 우리가 사용할 데이터를 저장하는 공간
  data() {
    return {
      navlist : ['홈', '상품', '기타'],
      sty_color_red: 'color: red', // 속성

      
      // prices : [1500, 24000, 10000],//int
      // products : ['양말', '티셔츠', '바지'], //string

     products : data,

     modalFlg: false,

     key : 0,
    }
  },
  // methods : 함수를 정의하는 영역
  methods: {
    plusOne(i) {
      this.products[i].reportCnt++;
    }
  }

}
</script>

<style>
@import url('./assets/css/common.css');
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
/* css 파일로 이관 */
/* .nav {
  background-color: #2c3e50;
  padding: 15px;
  border-radius: 10px;
}
.nav a {
  color: white;
  padding: 10px;
  text-decoration: none;
} */
/* .content {
  white-space: pre-line
} */
</style>
