<template lang="">
   <div class="bg_black">
    <div class="bg_white">
      <p class="close" @click="$emit('fncModal', false)">X</p>
      <img :src="data.img" alt=""/>
      <h4>{{data.name}}</h4>
      <p>{{data.content}}</p>
      <p>{{data.price}} 원</p>
      <input 
        type="text" 
        v-model="productCnt">
      <p>총 가격 : {{ productCnt * data.price }} 원</p>
      <p>허위 매물 신고 수 : {{data.reportCnt}}</p>
    </div>
  </div>
</template>
<script>
export default {
    name: 'Modal',
    data() {
        return {
            productCnt: 0,
            totalPrice: 0,
        }
    },
    // watch: data를 감시하는 함수를 정의하는 영역 
    watch: {
      // 데이터 값과 함수명이 일치 해야함
      productCnt(input) {
        if(input > 10) {
          alert('안돼');
          this.productCnt = 10;
        } else if(input < 0) {
          alert('안돼');
          this.productCnt = 0;
        }

      }
    },

    // props : 상위 컴포넌트의 데이터를 하위 컴포넌트가 쓰기위한 영역
    props: {
      // 받아온 데이터명, 데이터타입을 적어줌
      data: Object,

    }
}
</script>
<style lang="">
    
</style>