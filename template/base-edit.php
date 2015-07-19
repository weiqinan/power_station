<!DOCTYPE html>
<html>
 <?php include ('include/head_script.php')?>
<body>
  <div class="n-layout">
    <?php include ('include/header.php')?>

    <div class="n-container">

      <?php include ('include/nav_base.php')?>
	  <script>$('#nav_base_6').addClass('current');</script>

      <div class="n-right-content">
        <h4 class="tab-to-title">基站编辑</h4>
        <div class="current-name-area clearfix">
          <span class="vl-m fl-l name"><b>001</b>基站</span>

          <div class="fl-r">
            <div class="btn-group">
              <button type="button" class="btn btn-default">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><span class="vl-m">前一个基站</span>
              </button>
              <button type="button" class="btn btn-default">
                <span class="vl-m">后一个基站</span><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              </button>
            </div>
          </div>

        </div>



        <div class="nav-tabs-content">

          <style type="text/css">
          .table-bordered td.td-to-th{vertical-align: middle;}

          </style>
          <p style="color:#ff4400;">页面note：没输入框的部分是不能编辑的，其他可以编辑</p>
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td class="td-to-th">基站名称</td>
                <td>鹤东</td>
                <td class="td-to-th">站点类型</td>
                <td>基准站 / 节能站 / 预备站</td>
                <td class="td-to-th">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td class="td-to-th">基站编号</td>
                <td>cu-sh-pd-0001</td>
                <td class="td-to-th">用能方站号</td>
                <td>NH10113</td>
                <td class="td-to-th">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr class="td-empty">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td class="td-to-th">项目</td>
                <td>
                  <select>
                    <option>上海联通</option>
                    <option>北京移动</option>
                  </select>
                </td>
                <td class="td-to-th">工程分期</td>
                <td><input type="text" value="shcu1" class="form-control" /></td>
                <td class="td-to-th">建站时间</td>
                <td><input size="16" type="text" value="2012-06-15" readonly class="form-control form_datetime"></td>
              </tr>

              <tr>
                <td class="td-to-th">省</td>
                <td><select><option>上海</option></select></td>
                <td class="td-to-th">城市</td>
                <td><select><option>上海</option></select></td>
                <td class="td-to-th">区县</td>
                <td><select><option>浦东</option></select></td>
              </tr>

              <tr>
                <td class="td-to-th">地址</td>
                <td><input type="text" value="鹤东村沙东路13号" class="form-control" /></td>
                <td class="td-to-th">经度</td>
                <td><input type="text" value="123°" class="form-control" /></td>
                <td class="td-to-th">纬度</td>
                <td><input type="text" value="345°" class="form-control" /></td>
              </tr>

              <tr class="td-empty">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td class="td-to-th">供电类型</td>
                <td>
                  <select>
                    <option>市政供电</option>
                    <option>物业供电</option>
                  </select>
                </td>
                <td class="td-to-th">电价收费方</td>
                <td>
                  <select>
                    <option>供电局收费</option>
                    <option>物业收费</option>
                    <option>托收</option>
                  </select>

                </td>
                <td class="td-to-th">建筑类型</td>
                <td>
                  <select>
                    <option>板房</option>
                    <option>砖墙</option>
                  </select>
                </td>
              </tr>

              <tr>
                <td class="td-to-th">电价</td>
                <td><input type="text" value="0.91" class="form-control" /></td>
                <td class="td-to-th">分成比例</td>
                <td><input type="text" value="70%" class="form-control" /></td>
                <td class="td-to-th">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td class="td-to-th">局方电表号</td>
                <td><input type="text" value="0330303003q" class="form-control" /></td>
                <td class="td-to-th">我方电表号</td>
                <td><input type="text" value="cush0003" class="form-control" /></td>
                <td class="td-to-th">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

              <tr class="td-empty">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td class="td-to-th">空调数量</td>
                <td><input type="text" value="2" class="form-control" /></td>
                <td class="td-to-th">空调温感</td>
                <td><input type="text" value="2" class="form-control" /></td>
                <td class="td-to-th">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td class="td-to-th">室外温感</td>
                <td><input type="text" value="有" class="form-control" /></td>
                <td class="td-to-th">室内温感</td>
                <td><input type="text" value="有" class="form-control" /></td>
                <td class="td-to-th">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td class="td-to-th">进风机型号</td>
                <td><input type="text" value="厂家型号" class="form-control" /></td>
                <td class="td-to-th">出风机型号</td>
                <td><input type="text" value="厂家型号" class="form-control" /></td>
                <td class="td-to-th">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td class="td-to-th">恒温柜数量</td>
                <td><input type="text" value="1" class="form-control" /></td>
                <td class="td-to-th">蓄电池柜</td>
                <td><input type="text" value="厂家型号" class="form-control" /></td>
                <td class="td-to-th">蓄电池空调</td>
                <td><input type="text" value="厂家型号" class="form-control" /></td>
              </tr>

              <tr class="td-empty">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td class="td-to-th">负载（A）</td>
                <td><input type="text" value="78" class="form-control" /></td>
                <td class="td-to-th">能耗类型（A）</td>
                <td>
                  <select>
                    <option>10-20A</option>
                    <option>20-30A</option>
                    <option>30-40A</option>
                    <option>40-50A</option>
                    <option>50-60A</option>
                    <option>70A+</option>
                  </select>
                </td>
                <td class="td-to-th">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td class="td-to-th">SIM卡号</td>
                <td><input type="text" value="14567895678" class="form-control" /></td>
                <td class="td-to-th">ECU编号</td>
                <td><input type="text" value="1100119657" class="form-control" /></td>
                <td class="td-to-th">ECU扩展编号</td>
                <td><input type="text" value="厂家型" class="form-control" /></td>
              </tr>


            </tbody>
          </table>

          <div class="tl-r"><button type="button" class="btn btn-primary" style="width:120px;">确定</button></div>

        </div>

      </div>

    </div>

  </div>
</body>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/datepicker/bootstrap-datetimepicker.js"></script>

<script type="text/javascript">
$(function () {
    $(".form_datetime").datetimepicker({
      format: 'yyyy-mm-dd',
      language: 'cn'
    });
});
</script>
</html>
