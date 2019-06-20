import Axios from 'axios';

export function setPraise(data) {
  return Axios.post('/api/index/praise',data);
}

export function showTagsList(tags) {
  return Axios.get('/api/index/article/showListAsTag/'+tags);
}
