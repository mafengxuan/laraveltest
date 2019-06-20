<template lang="html">
  <div class="redRuler">
    <p>	<span style="color: rgb(255, 0, 0);">注意：矫正日记将在牙齿矫正日记小程序展现、以及劲松口腔微信公众号图文推送！如您发布日记则默认您同意本协议，如不同意可联系劲松口腔微信公众号在线客服删除日记(需返还奖励)，请您知晓！</span></p><p>	1、用户发布矫正日记审核通过后，直接奖励500元微信红包。</p><p>	2、矫正日记❤每达到100的节点，奖励100，上限500。</p><p>	3、现金红包奖励活动，是为回馈劲松口腔的老患者答谢活动，目前仅限在北京劲松口腔医院矫正的用户参与。其它用户可参与发帖，但不会有奖励，请知晓！</p><p>	4、发帖成功并通过审核后，将日记首屏截图，并提供您在劲松口腔就诊时的姓名和手机号，直接发送到“劲松口腔”官方微信公众号上，与在线客服确认后，需要您在本页面点击领取，红包将直接发送到您的微信。客服工作时间：周一到周五（09：00-17：30）.</p><p>	5、矫正日记主要讲述您的矫正历程，从开始决定做矫正，到选择医院，选择专家，矫正方案，咬模型，第一次戴牙套，戴牙套后吃饭的难题处理方法等等，矫正中发生的的一系列事情皆可作为日记内容。</p><p>	6、<strong style="color: rgb(32, 88, 103);">矫正日记要求：</strong></p><p>	①.&nbsp;字数要求至少1000字以上；</p><p>	②.&nbsp;至少上传4张无码漏牙照片，最好包含矫正前、矫正中、矫正后对比照片；</p><p>	③.&nbsp;日记中不得出现言语辱骂、淫秽等不良言论；</p><p>	④.&nbsp;具体可参考已通过审核的矫正日记；</p><p>	⑤.&nbsp;日记完整度越高，越容易通过审核、获得点赞；</p><p>	⑥.矫正日记发布后，仍可进行修改和日记的持续更新。</p><p>	<strong>7、矫正日记上传攻略：</strong></p><p>	<strong>①.&nbsp;由于小程序功能性限制，编辑日记时采用分段编辑，即一段文字保存后在编辑下一段，两段直接无法插入段落；</strong></p><p>	<strong>②.&nbsp;上传、删除文字或图片时，需点击保存草稿方可生效；</strong></p><p>	<strong>③.&nbsp;修改段落文字或图片时，也需要点击保存草稿方可生效；</strong></p><p>	<strong>④.&nbsp;写日记时一定养成随时保存草稿的好习惯哦！</strong></p>
  </div>
</template>

<script>
import loading from '../../../common/components/loading';
import toast from '../../../common/components/toast';
import { getRuler } from '../api/redbag';
export default {
  components: {
    loading
  },
  data() {
    return {

    }
  },
  methods: {

  },
  created() {
    getRuler()
  }
}
</script>

<style lang="css" scoped>
  .redRuler {
    background: #fff;
    padding: 0.2rem;
    font-size: 0.3rem;
    line-height: 0.44rem;
  }
  .redRuler p {
    margin-bottom: 0.2rem;
    text-indent: 2em;
  }
</style>
