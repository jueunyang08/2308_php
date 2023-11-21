<template lang="">
    <div>
        <div>
        <h4 @click="$emit('fncModal', true, data)">{{ data.name }}</h4>
        <p>{{ data.price }} 원</p>
        <button @click="$emit('PlusOne', data2)">허위 매물 신고</button>
        <span>신고수 : {{ data.reportCnt }} </span>
        </div>
    </div>
</template>
<script>
export default {
    name: 'List',

    props: {
      // 받아온 데이터명, 데이터타입을 적어줌
      data: Object,
      data2: Number,

    }
 
}
</script>
<style lang="">
    
</style>