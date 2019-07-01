import Axios from 'axios';

export function moneyAllList(data) {
  return Axios.get('/api/admin/moneyAllList?nickname='+data.nickname+'&status='+data.status+'&sDate='+data.sDate+"&eDate="+data.eDate);
}
