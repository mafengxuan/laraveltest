import request from '@/utils/request';

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

export function rejectTo(id) {
  return request({
    url: '/api/admin/reject/'+id,
    method: 'post'
  });
}
