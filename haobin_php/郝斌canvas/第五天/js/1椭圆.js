function BezierEllipse1(context, x, y, a, b)
{
   //关键是bezierCurveTo中两个控制点的设置
   //0.5和0.6是两个关键系数（在本函数中为试验而得）
   var ox = 0.5 * a,
       oy = 0.6 * b;

   context.save();
   context.translate(x, y);
   context.beginPath();
   //从椭圆纵轴下端开始逆时针方向绘制
   context.moveTo(0, b); 
   context.bezierCurveTo(ox, b, a, oy, a, 0);
   context.bezierCurveTo(a, -oy, ox, -b, 0, -b);
   context.bezierCurveTo(-ox, -b, -a, -oy, -a, 0);
   context.bezierCurveTo(-a, oy, -ox, b, 0, b);
   context.closePath();
   context.stroke();
   context.restore();

};