import Axios from 'axios';

export function articleShow(data) {
  return Axios.get('/api/admin/article/show/'+data.id);
}
