import request from '@/utils/request';
import Axios from 'axios';

export function articleList(data) {
  return request({
    url: '/api/admin/articleList/'+data.type+'?nickName='+data.nickName+'&sDate='+data.sDate+'&eDate='+data.eDate,
    method: 'get',
    data: data
  });
}

export function audit(id) {
  return request({
    url: '/api/admin/audit/'+id,
    method: 'post'
  });
}

export function rejectTo(data) {
  var remark = data.remark;
  return Axios.post('/api/admin/reject/'+data.id,{remark});
}
