import request from '@/utils/request';
import Axios from 'axios';

export function storeSlideShow(data) {
  console.log(data);
  return Axios.post('/api/admin/discovery/storeSlideShow',data);
}

export function showList(id) {
  return request({
    url: '/api/admin/discovery/showList/'+id,
    method: 'get'
  });
}
