import { createStore } from 'vuex';

const store = createStore({
    // state: data 저장공간
    state() {
        return {
            testStr: 'vuex 테스트용',
            laravelData: null, // 라라벨에서 받은데이터 저장용
        }
    },

    //-----------------------------------------------

    // mutations: 데이터 수정용 함수 저장 영역
    mutations: {
        //초기 데이터 셋팅 ( 라라벨에서 받은 )
       setLaravelData(state, data) {
        state.laravelData = data;
       }
    },
    //-----------------------------------------------

    // actions: ajax로 서버에 데이터를 요청할 때나 (시간 함수등) 비동기 처리는 actions에 정의
    actions: {
      
    }
});

export default store;