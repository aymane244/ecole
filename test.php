<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  width: 100%;
  height: 100%;
  background: #fff1f0;
  display: flex;
  justify-content: center;
  align-items: center;
}

.services-box
{
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
}

.service
{
  margin: 8px;
}

.flip-box {
  background-color: transparent;
  width: 300px;
  height: 200px;
  border: 1px solid #f1f1f1;  
  border-radius: 10px;
  perspective: 1000px;
}

.flip-box-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.8s;
  transform-style: preserve-3d;
  
  display: flex;
  justify-content: center;
  align-items: center;
}

.flip-box:hover .flip-box-inner {
  transform: rotateY(180deg);
}

.flip-box-front, .flip-box-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}

.flip-box-front {
  background-color: #fff;
  color: black;
  border-radius: 10px;
}

.flip-box-front img
{
  height: 50px;
  width: 50px;
}

.flip-box-back {
  background-color: #ffffff;
  color: #000;
  transform: rotateY(180deg);
  border-radius: 10px;
  padding: 16px;
}
    </style>
</head>
<body>
<div class="services-box">
    <div class="service">
      <div class="flip-box">
        <div class="flip-box-inner">
          <div class="flip-box-front">
            <img src="https://i.ibb.co/KXXzgvm/greeting-card.png">
            <h2>Front Side</h2>
          </div>
          <div class="flip-box-back">
            <p>We provide unique gifting ideas & products that will have a long-lasting impact on customers.</p>
          </div>
        </div>
      </div>
    </div>
</div>
</body>
</html>