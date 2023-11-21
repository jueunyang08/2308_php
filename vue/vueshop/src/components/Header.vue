<template lang="">
   <!-- 헤더 -->
  <div class="nav">
    <!-- 반복문 -->
    <a v-for="(item, i) in data" :key="i">{{ i + ' : ' + item }}</a>
  </div>
</template>
<script>
export default {
    name: 'Header',

    // props : 상위 컴포넌트의 데이터를 하위 컴포넌트가 쓰기위한 영역
    props: {
      // 받아온 데이터명, 데이터타입을 적어줌
      data: Array,
    }
}
</script>
<style lang="">
    
</style>

