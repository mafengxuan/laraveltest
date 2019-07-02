import Axios from 'axios';

export function setPraise(data) {
  return Axios.post('/api/index/praise/'+data.id,data);
}

export function showTagsList(tags) {
  return Axios.get('/api/index/article/showListAsTag/'+tags);
}

export function getList(data) {
  if(data.type){
    return Axios.get('/api/index/article/showList/'+data.type+'?page='+data.page);
  }else {

  }
}

export function forward(data) {
  return Axios.post('/api/index/forward/'+data);
}
