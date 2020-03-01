function load_data() {
  $.getJSON('data/filter5.json', function (info) {
    var listSemesterItems = '<option selected="selected" value="0">Select Semester</option>';

    for (i = 0; i < info.semester.length; i++) {
      listSemesterItems += "<option>" + info.semester[i] + "</option>";
    }
    $("#semester").html(listSemesterItems);

  });

}

function load_data2() {
  $.getJSON('data/filter2.json', function (info) {
    var listSubject = '<option selected="selected" value="0">Select Subject</option>';
    var branch = $('#branches').val();
    var semester = $('#semester').val();
    for (i = 0; i < info.Branches[branch][semester].length; i++) {
      listSubject += "<option>" + info.Branches[branch][semester][i] + "</option>";
    }
    $("#subject").html(listSubject);

  });
}
$(document).ready(function (){
  $.getJSON('data/filter5.json', function (info) {
    var listBranches = '<option selected="selected" value="0">Select Branches</option>';

    for (i = 0; i < info.Branches.length; i++) {
      listBranches += "<option>" + info.Branches[i] + "</option>";
    }
    $("#branches").html(listBranches);
  });
  $("#branches").change(function () {
    load_data();
  });
  $("#semester").change(function () {
    load_data2();
  });
});