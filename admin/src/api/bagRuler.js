import Axios from 'axios';

export function storeSlideArticle(data) {
  return Axios.post('/api/admin/discovery/storeSlideArticle',data);
}
