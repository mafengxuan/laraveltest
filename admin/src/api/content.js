import Axios from 'axios';

export function articleShow(data) {
  return Axios.get('/api/admin/article/show/'+data.id);
}

export function articleMsg(data) {
  return Axios.get('/api/admin/commentsList/'+data.id);
}

export function deleteMsg(data) {
  return Axios.post('/api/admin/comment/'+data.id);
}

// export function relpayMsg(data) {
//   return Axios.get('/api/admin/commentsList/'+data.id);
// }
