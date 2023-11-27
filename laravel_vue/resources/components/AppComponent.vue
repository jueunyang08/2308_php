<template lang="">
    <div>
        APP VUE 컴포넌트
        <h2> {{ $store.state.testStr }}</h2>
        <h2> 라라벨 데이터 name : {{ laravelData.name }}</h2>
        <h2> 라라벨 데이터 id : {{ laravelData.id }}</h2>
        <ul>
            <li><a href="/">루트</a></li>
            <li><a href="/login">로그인</a></li>
            <li><a href="/board">보드</a></li>
        </ul>
        <!-- 사용할때 주의(vue 에서 처리함) -->
        <router-link to="/login">라우터 로그인</router-link>
        
        <router-view></router-view>
    </div>
</template>
<script>
export default {
    name: 'AppComponent',
    // blade 파일 props
    props: {
        laravelData: Object,
    },
    // create 하기 전 데이터 미리 세팅
    beforeCreate() {
        this.$store.commit('setLaravelData', this.laravelData);
    }
}
</script>
<style lang="">
    
</style>