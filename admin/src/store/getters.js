const getters = {
  sidebar: state => state.app.sidebar,
  device: state => state.app.device,
  token: state => state.user.token,
  avatar: state => state.user.avatar,
  name: state => state.user.name,
  roles: state => state.user.roles,
  message: state => state.user.message,
  list: state => state.diary.list,
  audit: state => state.diary.audit,
  reject: state => state.diary.reject,
  messages: state => state.diary.message,
  errCode: state => state.diary.errCode
};
export default getters;
