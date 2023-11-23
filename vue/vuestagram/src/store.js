import { createStore } from 'vuex';
import axios from 'axios';
const store = createStore({
    // state: data 저장공간
    state() {
        return {
            boardData: [], // 게시글 저장용
            flgTapUI: 0, // 탭 ui용 플래그
            imgURL: '', // 작성탭 표시용 이미지 URL 저장용
            postFileData: null, // 글 작성 파일 데이터 저장용
            lastBoardId: 0, // 가장 마지막 로드 된 게시글 번호 저장용
            flgBtnMoreView : true, // 더보기 버튼 활성여부 플래그
        }
    },

    //-----------------------------------------------

    // mutations: 데이터 수정용 함수 저장 영역
    mutations: {
        // 초기 데이터 세팅용
        setBoardList(state, data) {
            state.boardData = data;
            this.commit('setLastBoardId', data[data.length - 1].id);
        },
        // 마지막 게시글 번호 세팅용
        setLastBoardId(state, num) {
            state.lastBoardId = num;
        },
        // 탭 ui 세팅용
        setFlgTapUI(state, num) {
            state.flgTapUI = num;
        },
        // 작성탭 표시용 이미지 URL 세팅용
        setImgURL(state, url) {
            state.imgURL = url;
        },
        // 글 작성 파일 데이터 세팅용
        setpostFileData(state, file) {
            state.postFileData = file;
        },
        // 작성 된 글 삽입용
        setUnshiftBoard(state, data) {
            state.boardData.unshift(data);
        },
        //작성 후 초기화 처리
        setClearAddData(state) {
            state.imgURL = '';
            state.postFileData = null;
        },
        // 더보기 데이터 추가
        setPushData(state, data) {
            state.boardData.push(data);
            state.lastBoardId = state.boardData[state.boardData.length - 1].id;
        },
        // 더보기 버튼 활성화
        setFlgBtnMoreView(state, boo) {
            state.flgBtnMoreView = boo;
        },
    },
    //-----------------------------------------------

    // actions: ajax로 서버에 데이터를 요청할 때나 (시간 함수등) 비동기 처리는 actions에 정의
    actions: {
        //초기 게시글 데이터 획득 ajax처리
        //context : store에 저장되있는 값 접근 파라미터 
        actionGetBoardList(context) {
            const url= 'http://112.222.157.156:6006/api/boards'
            const header = {
                headers : {
                    'Authorization': 'Bearer meerkat'
                }
            };
            

            // axios 파라미터 1:url 2:body 3:header)
            axios.get(url, header)
            .then(res => {
                console.log(res.data);
                // commit : mutations을 호출하는 메소드
                context.commit('setBoardList',res.data);
            })
            .catch(err => {
                console.log(err);
            })
        },
        // 글 작성 처리
        actionPostBoardAdd(context) {
            const url= 'http://112.222.157.156:6006/api/boards'
            const header = {
                headers : {
                    'Authorization': 'Bearer meerkat',
                    'Content-Type': 'multipart/form-data',
                }
            };
            const data = {
                name: '주은',
                img: context.state.postFileData,
                content: document.getElementById('content').value,
            };

            axios.post(url, data, header)
            .then(res => {
                // 작성글 데이터 저장
                context.commit('setUnshiftBoard', res.data);

                // 리스트 UI로 전환
                context.commit('setFlgTapUI', 0);

                // 작성 후 초기화 처리
                context.commit('setClearAddData');

            })
            .catch(err => {
                console.log(err);
            })
        },

        more(context) {
            const url= 'http://112.222.157.156:6006/api/boards'+ '/' +context.state.lastBoardId
            const header = {
                headers : {
                    'Authorization': 'Bearer meerkat',
                }
            };
                
            

            axios.get(url, header)
            .then(res => {
                
                // commit : mutations을 호출하는 메소드

                // 1. data 가 있을때 push
                if(res.data) {
                    context.commit('setPushData', res.data);
                // 2. data 가 없을 경우 더보기 버튼 비활성화
                }else {
                    context.commit('setFlgBtnMoreView', false);
                    
                }
                
            })
            .catch(err => {
                console.log(err.response.data);
            })
        },
    }
});

export default store;