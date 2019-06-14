import Axios from 'axios';

export function getRuler(data) {
  return Axios.get('/api/admin/rule/show/'+data.id);
}

export function rulerUpdate(data) {
  return Axios.post('/api/admin/rule/update/'+data.id,{
    content:data.content
  });
}
