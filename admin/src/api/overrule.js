import Axios from 'axios';

export function articleList(data) {
  return Axios.get('/api/admin/articleList/'+data.type+'?nickName='+data.nickName+'&sDate='+data.sDate+'&eDate='+data.eDate);
}

export function reAudit(data) {
  return Axios.post('/api/admin/reAudit/'+data.id);
}
