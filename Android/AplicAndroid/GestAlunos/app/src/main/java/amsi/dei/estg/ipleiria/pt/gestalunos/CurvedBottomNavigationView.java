package amsi.dei.estg.ipleiria.pt.gestalunos;

import android.content.Context;
import android.graphics.Canvas;
import android.graphics.Color;
import android.graphics.Paint;
import android.graphics.Path;
import android.graphics.Point;
import android.graphics.drawable.ColorDrawable;
import android.util.AttributeSet;

import com.google.android.material.bottomnavigation.BottomNavigationView;

import java.io.File;
import java.io.IOException;
import java.net.URI;
import java.nio.file.FileSystem;
import java.nio.file.LinkOption;

import java.nio.file.WatchEvent;
import java.nio.file.WatchKey;
import java.nio.file.WatchService;
import java.util.Iterator;

public class CurvedBottomNavigationView extends BottomNavigationView {
    //Declare variable
    private Path mPath;
    private Paint mPaint;

    //The radius of fab  but button

    public final int CURVE_CIRCLE_RADIUS=90;

    // The coordinates of the first curve

    public Point mFirstCurveStartPoint = new Point();
    public Point mFirstCurveEndPoint = new Point();
    public Point mFirstCurveControlPoint1 = new Point();
    public Point mFirstCurveControlPoint2 = new Point();

    //The coordinates of the second curve

    public Point mSecoundCurveStartPoint = new Point();
    public Point mSecoundCurveEndPoint = new Point();
    public Point mSecoundCurveControlPoint1 = new Point();
    public Point mSecoundCurveControlPoint2 = new Point();

    public int mNavigationBarWidth,mNavigationBarHeight;

    public CurvedBottomNavigationView(Context context) {
        super(context);
        initView();
    }

    public CurvedBottomNavigationView(Context context, AttributeSet attrs) {
        super(context, attrs);
        initView();

    }

    public CurvedBottomNavigationView(Context context, AttributeSet attrs, int defStyleAttr) {
        super(context, attrs, defStyleAttr);
        initView();

    }

    private void initView() {
        mPath = new Path();
        mPaint = new Paint();
        mPaint.setStyle(Paint.Style.FILL_AND_STROKE);
        mPaint.setColor(Color.parseColor("#CAF1FF"));
        setBackgroundColor(Color.WHITE);

    }

    @Override
    protected void onSizeChanged(int w, int h, int oldw, int oldh) {
        super.onSizeChanged(w, h, oldw, oldh);

        //Get width and height of navigation bar
        mNavigationBarWidth = getWidth();
        mNavigationBarHeight = getHeight();

        //the coordinates(x,y) of the start point before curve
        mFirstCurveStartPoint.set((mNavigationBarWidth/2)
                -(CURVE_CIRCLE_RADIUS*2)
                -(CURVE_CIRCLE_RADIUS/3),0);

        //the coordinates (x,y) of the end point after curve
        mFirstCurveEndPoint.set((mNavigationBarWidth/2),CURVE_CIRCLE_RADIUS+(CURVE_CIRCLE_RADIUS/4));

        //Same for secound curve
        mSecoundCurveStartPoint = mFirstCurveEndPoint;

        mSecoundCurveEndPoint.set((mNavigationBarWidth/2) + (CURVE_CIRCLE_RADIUS*2) + (CURVE_CIRCLE_RADIUS/3)
                ,0);

        //The coordinates (x,y) of the first control point on cubic curve
        mFirstCurveControlPoint1.set(mFirstCurveStartPoint.x + (CURVE_CIRCLE_RADIUS) + (CURVE_CIRCLE_RADIUS/4),
                mFirstCurveEndPoint.y);

        //The coordinates (x,y) of the secound control point on cubic curve
        mFirstCurveControlPoint1.set(mFirstCurveEndPoint.x-(CURVE_CIRCLE_RADIUS*2)+CURVE_CIRCLE_RADIUS,
                mFirstCurveEndPoint.y);

        mSecoundCurveControlPoint1.set(mSecoundCurveStartPoint.x + (CURVE_CIRCLE_RADIUS*2) - CURVE_CIRCLE_RADIUS, mSecoundCurveStartPoint.y );
        mSecoundCurveControlPoint2.set(mSecoundCurveEndPoint.x-(CURVE_CIRCLE_RADIUS+(CURVE_CIRCLE_RADIUS/4)), mSecoundCurveEndPoint.y);

    }

    @Override
    protected void onDraw(Canvas canvas) {
        super.onDraw(canvas);
        mPath.reset();
        mPath.moveTo(0,0);
        mPath.lineTo(mFirstCurveStartPoint.x,mFirstCurveStartPoint.y);

        mPath.cubicTo(mFirstCurveControlPoint1.x,mFirstCurveControlPoint1.y,
                mFirstCurveControlPoint2.x,mFirstCurveControlPoint2.y,
                mFirstCurveEndPoint.x,mFirstCurveEndPoint.y);

        mPath.cubicTo(mSecoundCurveControlPoint1.x,mSecoundCurveControlPoint1.y,
                mSecoundCurveControlPoint2.x,mSecoundCurveControlPoint2.y,
                mSecoundCurveEndPoint.x,mSecoundCurveEndPoint.y);

        mPath.lineTo(mNavigationBarWidth,0);
        mPath.lineTo(mNavigationBarWidth,mNavigationBarHeight);
        mPath.lineTo(0,mNavigationBarHeight);
        mPath.close();

        canvas.drawPath(mPath,mPaint);

    }
}
