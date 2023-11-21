<template>
  <img alt="Vue logo" src="./assets/logo.png">
  <!-- 헤더 -->
  <Header :data="navlist"></Header>
  <!-- 할인 배너 -->
  <Discount> </Discount>

 
  <!-- 모달 -->
  <Transition name="modalAni">

    <Modal 
    v-if="modalFlg"
    :data="modalProduct"
    @fncModal = "fncModal"
    >
    </Modal>
  
  </Transition>


  <!-- 상품 리스트~ -->
  <List v-for="(item, i) in products" :key="i"
  :data="item" :data2="i"
  @PlusOne = "plusOne"
  @fncModal = "fncModal"

  ></List>
      
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
  
</template>

<script>
import data from './assets/js/data.js';

import Discount from './components/Discount.vue';

import Header from './components/Header.vue';

import Modal from './components/Modal.vue';

import List from './components/List.vue'


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

     modalProduct: {}
    }
  },
  // methods : 함수를 정의하는 영역
  methods: {
    plusOne(i) {
      this.products[i].reportCnt++;
    },
    fncModal(flg,item={}) {
      this.modalFlg = flg
      this.modalProduct = item
    },
    // modalOpen(item) {
    //   this.modalFlg = true;
    //   this.modalProduct = item;
    // },
  },

  components: {
    Discount,
    Header,
    Modal,
    List,
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
