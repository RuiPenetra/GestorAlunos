package amsi.dei.estg.ipleiria.pt.gestalunos;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.animation.ValueAnimator;
import android.graphics.Color;
import android.os.Bundle;
import android.view.MenuItem;
import android.view.View;
import android.widget.RelativeLayout;
import android.widget.Toast;

import com.google.android.material.bottomnavigation.BottomNavigationView;
import com.sdsmdg.harjot.vectormaster.VectorMasterView;
import com.sdsmdg.harjot.vectormaster.models.PathModel;

public class HomeActivity extends AppCompatActivity implements BottomNavigationView.OnNavigationItemSelectedListener {

    CurvedBottomNavigationView bottomNavigationView;
    VectorMasterView fab,fab1,fab2;
    RelativeLayout lin_id;
    PathModel outline;
    private Object Float;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);

        //View
        bottomNavigationView = (CurvedBottomNavigationView) findViewById(R.id.bottom_nav);

        fab = (VectorMasterView) findViewById(R.id.fab);
        fab1 = (VectorMasterView) findViewById(R.id.fab1);
        fab2 = (VectorMasterView) findViewById(R.id.fab2);

        lin_id=(RelativeLayout)findViewById(R.id.lin_id);

        bottomNavigationView.inflateMenu(R.menu.menu);

        //Set event for bottom nav
        bottomNavigationView.setOnNavigationItemSelectedListener(this);

    }

    @Override
    public boolean onNavigationItemSelected(@NonNull MenuItem menuItem) {
        switch (menuItem.getItemId())
        {
            case R.id.action_shopping:
                Toast.makeText(this, "Click to Cart", Toast.LENGTH_SHORT).show();

                //Animation
                draw(6);
                //Find the correct path using name
                lin_id.setX(bottomNavigationView.mFirstCurveControlPoint1.x);
                fab.setVisibility(View.VISIBLE);
                fab1.setVisibility(View.GONE);
                fab2.setVisibility(View.GONE);
                drawAnimation(fab);
                break;

            case R.id.action_shipping:
                Toast.makeText(this, "Click to Shipping", Toast.LENGTH_SHORT).show();

                //Animation
                draw(2);
                //Find the correct path using name
                lin_id.setX(bottomNavigationView.mFirstCurveControlPoint1.x);
                fab.setVisibility(View.GONE);
                fab1.setVisibility(View.VISIBLE);
                fab2.setVisibility(View.GONE);
                drawAnimation(fab1);
                break;

            case R.id.action_customer:
                Toast.makeText(this, "Click to Customer", Toast.LENGTH_SHORT).show();

                //Animation
                draw();
                //Find the correct path using name
                lin_id.setX(bottomNavigationView.mFirstCurveControlPoint1.x);
                fab.setVisibility(View.GONE);
                fab1.setVisibility(View.GONE);
                fab2.setVisibility(View.VISIBLE);
                drawAnimation(fab2);
                break;
        }
        return true;
    }

    private void draw() {
        bottomNavigationView.mFirstCurveStartPoint.set((bottomNavigationView.mNavigationBarWidth * 10/12)
        - (bottomNavigationView.CURVE_CIRCLE_RADIUS *2)
        - (bottomNavigationView.CURVE_CIRCLE_RADIUS/3),0);

        bottomNavigationView.mFirstCurveEndPoint.set(bottomNavigationView.mNavigationBarWidth * 10/12,
                bottomNavigationView.CURVE_CIRCLE_RADIUS
                +(bottomNavigationView.CURVE_CIRCLE_RADIUS/4));

        bottomNavigationView.mSecoundCurveStartPoint = bottomNavigationView.mFirstCurveEndPoint;
        bottomNavigationView.mSecoundCurveEndPoint.set((bottomNavigationView.mNavigationBarWidth * 10/12)
                +(bottomNavigationView.CURVE_CIRCLE_RADIUS*2)+(bottomNavigationView.CURVE_CIRCLE_RADIUS/3),0);

        bottomNavigationView.mFirstCurveControlPoint1.set(bottomNavigationView.mFirstCurveStartPoint.x
                        +bottomNavigationView.CURVE_CIRCLE_RADIUS + (bottomNavigationView.CURVE_CIRCLE_RADIUS/4),
                bottomNavigationView.mFirstCurveStartPoint.y);


        bottomNavigationView.mFirstCurveControlPoint2.set(bottomNavigationView.mFirstCurveEndPoint.x -
                        (bottomNavigationView.CURVE_CIRCLE_RADIUS*2)+bottomNavigationView.CURVE_CIRCLE_RADIUS,
                bottomNavigationView.mFirstCurveEndPoint.y);

        //Same with second
        bottomNavigationView.mSecoundCurveControlPoint1.set(bottomNavigationView.mSecoundCurveStartPoint.x
                        + (bottomNavigationView.CURVE_CIRCLE_RADIUS*2) - bottomNavigationView.CURVE_CIRCLE_RADIUS,
                bottomNavigationView.mSecoundCurveStartPoint.y);
        bottomNavigationView.mSecoundCurveControlPoint2.set(bottomNavigationView.mSecoundCurveEndPoint.x-
                (bottomNavigationView.CURVE_CIRCLE_RADIUS + (bottomNavigationView.CURVE_CIRCLE_RADIUS/4)),bottomNavigationView.mSecoundCurveEndPoint.y);



    }

    private void drawAnimation(final VectorMasterView fab) {
        outline = fab.getPathModelByName("outline");
        outline.setStrokeColor(Color.WHITE);
        outline.setTrimPathEnd(0.0f);
        //Init valueAnimatior
        final ValueAnimator valueAnimator = ValueAnimator.ofFloat(0.0f,1.0f);
        valueAnimator.setDuration(1000);
        valueAnimator.addUpdateListener(new ValueAnimator.AnimatorUpdateListener() {
            @Override
            public void onAnimationUpdate(ValueAnimator animation) {
                outline.setTrimPathEnd((Float) valueAnimator.getAnimatedValue());
                fab.update();
            }
        });
        valueAnimator.start();

    }

    private void draw(int i) {

        bottomNavigationView.mFirstCurveStartPoint.set((bottomNavigationView.mNavigationBarWidth/i)
        -(bottomNavigationView.CURVE_CIRCLE_RADIUS*2)-(bottomNavigationView.CURVE_CIRCLE_RADIUS/3),0);

        bottomNavigationView.mFirstCurveEndPoint.set(bottomNavigationView.mNavigationBarWidth/i,bottomNavigationView.CURVE_CIRCLE_RADIUS
        +(bottomNavigationView.CURVE_CIRCLE_RADIUS/4));

        bottomNavigationView.mSecoundCurveStartPoint = bottomNavigationView.mFirstCurveEndPoint;
        bottomNavigationView.mSecoundCurveEndPoint.set((bottomNavigationView.mNavigationBarWidth/i)
        +(bottomNavigationView.CURVE_CIRCLE_RADIUS*2)+(bottomNavigationView.CURVE_CIRCLE_RADIUS/3),0);

        bottomNavigationView.mFirstCurveControlPoint1.set(bottomNavigationView.mFirstCurveStartPoint.x
        +bottomNavigationView.CURVE_CIRCLE_RADIUS + (bottomNavigationView.CURVE_CIRCLE_RADIUS/4),
                bottomNavigationView.mFirstCurveStartPoint.y);

        bottomNavigationView.mFirstCurveControlPoint2.set(bottomNavigationView.mFirstCurveEndPoint.x -
                (bottomNavigationView.CURVE_CIRCLE_RADIUS*2)+bottomNavigationView.CURVE_CIRCLE_RADIUS,
                bottomNavigationView.mFirstCurveEndPoint.y);

        //Same with second
        bottomNavigationView.mSecoundCurveControlPoint1.set(bottomNavigationView.mSecoundCurveStartPoint.x
                        + (bottomNavigationView.CURVE_CIRCLE_RADIUS*2) - bottomNavigationView.CURVE_CIRCLE_RADIUS,
                bottomNavigationView.mSecoundCurveStartPoint.y);
        bottomNavigationView.mSecoundCurveControlPoint2.set(bottomNavigationView.mSecoundCurveEndPoint.x-
                (bottomNavigationView.CURVE_CIRCLE_RADIUS + (bottomNavigationView.CURVE_CIRCLE_RADIUS/4)),bottomNavigationView.mSecoundCurveEndPoint.y);

    }
}
