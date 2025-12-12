<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>手指拖拽 + 翻页版</title>

<style>
  body {
    font-family: Arial, sans-serif;
    padding: 10px;
    overscroll-behavior: none;
    max-width: 1000px;
    margin: 0 auto;
    transform: scale(0.95);
    transform-origin: top center;
    width: 100%;
  }

  .pageGroup {
    display: flex;
    flex-direction: column;
    gap: 25px;
  }

  .iframeContainer {
    position: relative;
    width: 100%;
    max-width: 700px;
    height: 2800px;
    border: 1px solid #ccc;
    overflow: hidden;
    touch-action: none;
    margin: 0 auto;
  }

  iframe {
    width: 100%;
    height: 100%;
    border: none;
    display: block;
  }

  .sizeDisplay {
    position: absolute;
    top: 5px;
    left: 5px;
    background: rgba(0,0,0,0.5);
    color: #fff;8
    padding: 2px 5px;
    font-size: 12px;
    border-radius: 3px;
    z-index: 10;
  }

  .nav {
    text-align: center;
    margin: 20px 0;
  }

  .nav button {
    padding: 8px 16px;
    margin: 0 10px;
    font-size: 16px;
    border: none;
    background: #007bff;
    color: #fff;
    border-radius: 6px;
  }

  .nav button:disabled {
    background: #aaa;
  }
</style>

</head>
<body>

<h2 style="text-align:center;">

在迷茫时使用新增方法，2026

新增方法，清空后，随机反选遗漏码，

随机选满后反选遗留码，


<br>
  
 万能的反选切换功能，反选提取遗漏码，反选提取
 
 上期码，反选提取除上期码以外的所有号码，
 
 <br>
 
 1-35 自由随一，异彩码移花接木，双区混合掺码，S1 —S4随机切换，最新开奖结果随一，反选上期码，等，
 等，核心方法，2026年1月1，万能的反选切换功能

</h2>
<h1>

双后区，保留从3到2正好位,后区正好位优先</h1>

<h2 style="text-align:center;">前区后区可同时放入走势图复选</h2>

<div class="nav">
  <button id="prevBtn">上一页</button>
  <span id="pageInfo">1 / 1</span>
  <button id="nextBtn">下一页</button>
</div>

<div id="pageArea"></div>

<script>
const iframeList = [
 

 
 

  "ua6pmv666666666.php",
  "18ua888888888888888888hc.php",   
  "ua2pmv222222222.php",
  "indexxxxxxxssq.html",
  "sn99999999999sn.php", 
  
  
  
 

  
 
  "uasssssssssss9.php",
 
  "18ua888888888888888888hc.php",
  
   "2qc222222222pmv.php",   
  
   "indexxxxxxxssq.html",
  
  "sn99999999999sn.php", 
 
 
 
 
  "uassssssssss6.php",
 
  "18ua888888888888888888hc.php",
  
  "2qc222222222pmv.php",   
  
  "indexxxxxxxssq.html",
  
  "sn99999999999sn.php", 
    
    

  

  
  

  
  

  

];

// ------------------------
//  每页显示 5 个 iframe
// ------------------------
const pageSize = 5;

const totalPages = Math.ceil(iframeList.length / pageSize);
let currentPage = 0;

const pageArea = document.getElementById("pageArea");
const prevBtn = document.getElementById("prevBtn");
const nextBtn = document.getElementById("nextBtn");
const pageInfo = document.getElementById("pageInfo");

// 更新页面
function updatePage() {
  const start = currentPage * pageSize;
  const end = start + pageSize;

  const items = iframeList.slice(start, end);

  pageArea.innerHTML = `
    <div class="pageGroup">
      ${items.map(src => `
        <div class='iframeContainer'>
          <div class='sizeDisplay'></div>
          <iframe src="${src}"></iframe>
        </div>
      `).join('')}
    </div>
  `;

  pageInfo.textContent = `${currentPage + 1} / ${totalPages}`;
  prevBtn.disabled = currentPage === 0;
  nextBtn.disabled = currentPage === totalPages - 1;

  initResize();
}

prevBtn.onclick = () => {
  if (currentPage > 0) {
    currentPage--;
    updatePage();
  }
};

nextBtn.onclick = () => {
  if (currentPage < totalPages - 1) {
    currentPage++;
    updatePage();
  }
};

// 保留你原来的拖拽缩放功能
function initResize() {
  const containers = document.querySelectorAll('.iframeContainer');
  const MIN_WIDTH = 100;
  const MAX_WIDTH = 700;

  containers.forEach(container => {
      const display = container.querySelector('.sizeDisplay');
      let startX, startWidth, startHeight;

      function updateDisplay() {
          display.textContent = `${container.offsetWidth}px × ${container.offsetHeight}px`;
      }
      updateDisplay();

      container.addEventListener('touchstart', function(e) {
          e.preventDefault();
          const t = e.touches[0];
          startX = t.clientX;
          startWidth = container.offsetWidth;
          startHeight = container.offsetHeight;
      }, { passive: false });

      container.addEventListener('touchmove', function(e) {
          e.preventDefault();
          const t = e.touches[0];
          let dx = t.clientX - startX;

          let newWidth = Math.min(Math.max(startWidth + dx, MIN_WIDTH), MAX_WIDTH);
          container.style.width = newWidth + 'px';

          let scale = newWidth / startWidth;
          let newHeight = Math.max(100, startHeight * scale);
          container.style.height = newHeight + 'px';

          updateDisplay();
      }, { passive: false });

      container.addEventListener('touchend', function() {
          updateDisplay();
      });
  });
}

updatePage();
</script>

</body>
</html>
