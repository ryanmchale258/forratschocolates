analyticsScript = function(){
  //authorize access
  var clientId = '1010502107994-aj00bgva4l56fg32oo2ndb2mbs2r6ee9.apps.googleusercontent.com',
  apiKey = 'AIzaSyAhLp11xqoJtrLvgvvaqvZBsTzwvy8S0F8',
  scopes = 'https://www.googleapis.com/auth/analytics',
  authButton = document.querySelector('#authorize-button'),
  month1views = 0,
  month2views = 0,
  month3views = 0,
  month4views = 0,
  month1users = 0,
  month2users = 0,
  month3users = 0,
  month4users = 0;


  function clientLoad(){//declares API key and sets a failure timer
    console.log("fired clientLoad");
    gapi.client.setApiKey(apiKey);
    window.setTimeout(checkAuth,1);
    handleAuthClick();
  }

  function checkAuth(){//checks authorization
    console.log("fired checkAuth");
    gapi.auth.authorize({client_id: clientId, scope: scopes, immediate: false}, handleAuthResult);
  }

  function handleAuthResult(authResult){//authorization handler
    console.log("fired handleAuthResult");
    if(authResult && !authResult.error){
      loadLib();
    }else{
      console.log(authResult);
      handleUnAuthorized();
    }
  }

  function handleAuthorized(){//if authorized
    console.log("fired handleAuthorized");
    apiCallButton.onclick = makeApiCall;
  }

  function handleUnAuthorized(){//if unautorized
    console.log("fired handleUnAuthorized");
    authButton.onclick = handleAuthClick;
  }

  function handleAuthClick(event) {//if authorized buttin is clicked reinitiates the authorization flow
    console.log("fired handleAuthClick");
    gapi.auth.authorize({client_id: clientId, scope: scopes, immediate: false}, handleAuthResult);
    return false;
  }

  //creating analytics service object
  function loadLib() {//loads specified library
    console.log("fired loadLib");
    gapi.client.load('analytics', 'v3', makeApiCall);
  }

  function month1Lib(){
     gapi.client.load('analytics', 'v3', fourMonthApiCall1);
  }

  function month2Lib(){
     gapi.client.load('analytics', 'v3', fourMonthApiCall2);
  }

  function month3Lib(){
     gapi.client.load('analytics', 'v3', fourMonthApiCall3);
  }

  function month4Lib(){
     gapi.client.load('analytics', 'v3', fourMonthApiCall4);
  }

  function makeApiCall() {//makes api query with supplied information
    console.log("fired makeApiCall");
    var apiQuery = gapi.client.analytics.data.ga.get({
      'ids': 'ga:101169415',
      'start-date': '30daysAgo',
      'end-date': 'yesterday', 
      'metrics': 'ga:sessions,ga:pageviews,ga:users,ga:newUsers,ga:bounceRate'
    });
    apiQuery.execute(handleCoreReportingResults);
  }

  //core data request
  function handleCoreReportingResults(results){
    console.log("fired handleCoreReportingResults");
    if(!results.error){
      console.log("error free core report");
      postColHeaders(results);
      printRows(results);
    }else{
      console.log(results.message);
    }
  }

  function postColHeaders(results){
    console.log("fired postColHeaders");
    var output = [];

    for(var i = 0, header; header = results.columnHeaders[i]; ++i){
      output.push(
        'Name         =',header.name,'\n',
        'Column Type  =',header.columnType,'\n',
        'Data Type    =',header.dataType,'\n'
      );
    }
    console.log(output.join(''));
  }

  function printRows(results) {
    output = [];

    for(var i=0, row; row = results.rows[i]; ++i){
      output.push(
        'Sessions     =',row[0],'\n',
        'Pageviews    =',row[1],'\n',
        'Users        =',row[2],'\n',
        'New Users    =',row[3],'\n',
        'Bounce Rate  =',row[4],'\n'
      );

      var totalUsers = row[2]; //this is the total users variable, not sure exactly what you had in mind, but I think an inner HTML swap would do.
      //could be used in a function like declareTotalusers(totalUsers); then function declareTotalUsers(totalUsers){somecodethatusesthevariable}
      console.log(totalUsers);

      var userData = [
        {
          value: row[3],
          color: "#616774",
          highlight: "#4D5360",
          label: "New users this month"
        },
        {
          value: (row[2]-row[3]),
          color:"A8B3C5",
          highlight:"#949FB1",
          label:"Returning users from previous months"
        }
      ];

      var viewData = {
        labels : ["Sessions, Pageviews & Bounce Rate"],
        datasets : [
          {
            fillColor : "rgba(220,220,220,0.5)",
            strokeColor : "rgba(220,220,220,0.8)",
            highlightFill: "rgba(220,220,220,0.75)",
            highlightStroke: "rgba(220,220,220,1)",
            data : [row[0]]
          },
          {
            fillColor : "rgba(151,187,205,0.5)",
            strokeColor : "rgba(151,187,205,0.8)",
            highlightFill: "rgba(151,187,205,0.75)",
            highlightStroke: "rgba(151,187,205,1)",
            data : [row[1]]
          },
          {
            fillColor : "rgba(151,0,0,0.5)",
            strokeColor : "rgba(151,0,0,0.8)",
            highlightFill: "rgba(151,0,0,0.75)",
            highlightStroke: "rgba(151,0,0,1)",
            data : [row[4]]
          }
        ]
      };

      makeUserChart(userData);
      makeViewChart(viewData);
      month1Lib();
    }

    console.log(output.join(''));
  }

  function makeUserChart(userData){
    var ctx = document.querySelector("#chart-area").getContext("2d");
    window.myDoughnut = new Chart(ctx).Doughnut(userData, {responsive : true});
  }

  function makeViewChart(viewData){
    var ctx = document.querySelector("#chart-area2").getContext("2d");
    window.myBar = new Chart(ctx).Bar(viewData, {
      responsive : true
    });
  }


  function fourMonthApiCall1(){
    console.log("fourMonthApiCall fired");
    var apiQuery = gapi.client.analytics.data.ga.get({
      'ids': 'ga:101169415',
      'start-date': '2015-01-01',
      'end-date': '2015-01-31',
      'metrics': 'ga:pageviews,ga:users'
    });
    apiQuery.execute(month1);
  }

  function fourMonthApiCall2(){
    console.log("fourMonthApiCall fired");
    var apiQuery = gapi.client.analytics.data.ga.get({
      'ids': 'ga:101169415',
      'start-date': '2015-02-01',
      'end-date': '2015-02-28',
      'metrics': 'ga:pageviews,ga:users'
    });
    apiQuery.execute(month2);
  }

  function fourMonthApiCall3(){
    console.log("fourMonthApiCall fired");
    var apiQuery = gapi.client.analytics.data.ga.get({
      'ids': 'ga:101169415',
      'start-date': '2015-03-01',
      'end-date': '2015-03-31',
      'metrics': 'ga:pageviews,ga:users'
    });
    apiQuery.execute(month3);
  }

  function fourMonthApiCall4(){
    console.log("fourMonthApiCall fired");
    var apiQuery = gapi.client.analytics.data.ga.get({
      'ids': 'ga:101169415',
      'start-date': '2015-04-01',
      'end-date': '2015-04-30',
      'metrics': 'ga:pageviews,ga:users'
    });
    apiQuery.execute(month4);
  }

  function month1(results){
    console.log("month 1 declaring");
    if(!results.error){
      declareData1(results);
    }else{
      console.log(results.message);
    }
  }

  function month2(results){
    console.log("month 2 declaring");
    if(!results.error){
      declareData2(results);
    }else{
      console.log(results.message);
    }
  }

  function month3(results){
    console.log("month 3 declaring");
    if(!results.error){
      declareData3(results);
    }else{
      console.log(results.message);
    }
  }

  function month4(results){
    console.log("month 4 declaring");
    if(!results.error){
      declareData4(results);
    }else{
      console.log(results.message);
    }
  }

  function declareData1(results){
    console.log(results.totalsForAllResults['ga:users']);
    month1views = results.totalsForAllResults['ga:pageviews'];
    month1users = results.totalsForAllResults['ga:users'];
    month2Lib();
  }

  function declareData2(results){
    console.log(results.totalsForAllResults['ga:users']);
    month2views = results.totalsForAllResults['ga:pageviews'];
    month2users = results.totalsForAllResults['ga:users'];
    month3Lib();
  }

  function declareData3(results){
    console.log(results.totalsForAllResults['ga:users']);
    month3views = results.totalsForAllResults['ga:pageviews'];
    month3users = results.totalsForAllResults['ga:users'];
    month4Lib();
  }

  function declareData4(results){
    console.log(results.totalsForAllResults['ga:users']);
    month4views = results.totalsForAllResults['ga:pageviews'];
    month4users = results.totalsForAllResults['ga:users'];
    makeFourMonthGraph();
  }

  function makeFourMonthGraph(){
    console.log("Month1:  ",month1users,"  ",month1views,"Month2:  ",month2users,"  ",month2views,"Month3:  ",month3users,"  ",month3views,"Month4:  ",month4users,"  ",month4views);
    var lineChartData = {
      labels : ["January","February","March","April"],
      datasets :[
        {
        label: "Pageviews",
          fillColor : "rgba(220,220,220,0.2)",
          strokeColor : "#fff",
          pointColor : "rgba(220,220,220,1)",
          pointStrokeColor : "#fff",
          pointHighlightFill : "#fff",
          pointHighlightStroke : "rgba(220,220,220,1)",
          data : [month1views,month2views,month3views,month4views]
        },
        {
        label: "Users",
          fillColor : "rgba(151,187,205,0.2)",
          strokeColor : "blue",
          pointColor : "rgba(151,187,205,1)",
          pointStrokeColor : "#fff",
          pointHighlightFill : "#fff",
          pointHighlightStroke : "rgba(151,187,205,1)",
          data : [month1users,month2users,month3users,month4users]
        }
      ]
    }
    createFourMonth(lineChartData);
  }

  function createFourMonth(lineChartData){
    var ctx = document.getElementById("4month").getContext("2d");
    window.myLine = new Chart(ctx).Line(lineChartData, {
      responsive: true
    });
  }

  window.addEventListener('load',clientLoad,false);

};
