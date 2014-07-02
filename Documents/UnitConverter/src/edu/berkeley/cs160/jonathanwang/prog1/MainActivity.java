package edu.berkeley.cs160.jonathanwang.prog1;

import android.app.Activity;
import android.os.Bundle;
import android.view.Menu;
import android.view.View;
import android.widget.AdapterView;
import android.widget.AdapterView.OnItemSelectedListener;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.SeekBar;
import android.widget.SeekBar.OnSeekBarChangeListener;
import android.widget.Spinner;
import android.widget.TextView;

public class MainActivity extends Activity {
	private EditText top;
	private TextView bot;
	private Button Convert;
	private Button Swap;
	private SeekBar topseek;
	
	private Spinner topspinner;
	private TextView convertTarget;
	
    //String paths [] = {"Farenheit", "Celsius", "pounds", "grams", "miles", "kilometers"};

    @Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);
		
		top = (EditText)findViewById(R.id.topbox);
		bot = (TextView)findViewById(R.id.botbox);
		Convert = (Button)findViewById(R.id.button1);
		Swap = (Button)findViewById(R.id.button2);
		
		topseek = (SeekBar) findViewById(R.id.seekBar1);
		
		topspinner = (Spinner) findViewById(R.id.spinner1);
		convertTarget = (TextView) findViewById(R.id.convertTarget);
		
		//ArrayAdapter<String> adapter = new ArrayAdapter<String>(this, android.R.layout.simple_spinner_item, paths);
		//topspinner.setAdapter(adapter);
		
		//CONVERT BUTTON
		Convert.setOnClickListener(new View.OnClickListener()
		{
			  @Override
			  public void onClick(View view){
				  String topselect = topspinner.getSelectedItem().toString();
				  double topvalue = Double.valueOf(top.getText().toString());
				  if (topselect.equals("Fahrenheit")){
					  bot.setText(String.valueOf(FahrToCels(topvalue)));
					  convertTarget.setText("Celsius");
				  }
				  if (topselect.equals("Celsius")){
					  bot.setText(String.valueOf(CelsToFahr(topvalue))); 	
					  convertTarget.setText("Fahrenheit");
				  }
				  if (topselect.equals("pounds")){
					  bot.setText(String.valueOf(PoundsToGrams(topvalue)));
					  convertTarget.setText("grams");
				  }
				  if (topselect.equals("grams")){
					  bot.setText(String.valueOf(GramsToPounds(topvalue)));
					  convertTarget.setText("pounds");
				  }
				  if (topselect.equals("miles")){
					  bot.setText(String.valueOf(MilesToKilometers(topvalue)));
					  convertTarget.setText("kilometers");
				  }
				  if (topselect.equals("kilometers")){
					  bot.setText(String.valueOf(KilometersToMiles(topvalue)));
					  convertTarget.setText("miles");
				  }
			}
		});
		
		//SWAP BUTTON
		Swap.setOnClickListener(new View.OnClickListener()
		{
			 @Override
			  public void onClick(View view){
				int position = topspinner.getSelectedItemPosition();
				switch (position)
				{
				case 0: 
					topspinner.setSelection(1);
					convertTarget.setText("Fahrenheit");
					break;
				case 1:
					topspinner.setSelection(0);
					convertTarget.setText("Celsius");
					break;
				case 2:
					topspinner.setSelection(3);
					convertTarget.setText("pounds");
					break;
				case 3:
					topspinner.setSelection(2);
					convertTarget.setText("grams");
					break;
				case 4:
					topspinner.setSelection(5);
					convertTarget.setText("miles");
					break;
				case 5:
					topspinner.setSelection(4);
					convertTarget.setText("kilometers");
					break;
				}
			 }
		});
		
		//SPINNER SELECTION
		topspinner.setOnItemSelectedListener(new OnItemSelectedListener()
		{
			@Override
			public void onItemSelected(AdapterView<?> arg0, View arg1,
					int arg2, long arg3) {
				// TODO Auto-generated method stub
				int position = topspinner.getSelectedItemPosition();
				switch (position)
				{
				case 0: 
					convertTarget.setText("Celsius");
					break;
				case 1:
					convertTarget.setText("Farenheit");
					break;
				case 2:
					convertTarget.setText("grams");
					break;
				case 3:
					convertTarget.setText("pounds");
					break;
				case 4:
					convertTarget.setText("kilometers");
					break;
				case 5:
					convertTarget.setText("miles");
					break;
				case 6:
					break;
				}		
			}
			@Override
			public void onNothingSelected(AdapterView<?> arg0) {
				// TODO Auto-generated method stub
				
			}
		});
		
		
		/*
		
        adapter = new ArrayAdapter<String>(this,
                                        android.R.layout.simple_spinner_item, numbers);
        topspinner.setAdapter(adapter);
        
        topspinner.setOnClickListener(new View.OnClickListener()
        {
			@Override
			public void onClick(View v) {
				String spin = topspinner.getSelectedItem().toString();
				
			}
        });
*/		
		//TOP SEEKBAR
		topseek.setOnSeekBarChangeListener(new OnSeekBarChangeListener()
		{
			@Override
			public void onProgressChanged(SeekBar arg0, int arg1, boolean arg2) {
				// TODO Auto-generated method stub
				top.setText(""+arg1);
				
			}

			@Override
			public void onStartTrackingTouch(SeekBar arg0) {
				// TODO Auto-generated method stub
				
			}

			@Override
			public void onStopTrackingTouch(SeekBar arg0) {
				// TODO Auto-generated method stub
				
			}
		});

    }
    
	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.main, menu);
		return true;
	}

	private double FahrToCels (double Fahr) {
		return (Fahr-32)*5/9;
	}
	private double CelsToFahr (double Cels){
		return Cels*9/5+32;
	}
	private double PoundsToGrams (double Pounds) {
		return Pounds/0.0022046;
	}
	private double GramsToPounds (double Grams){
		return Grams*0.0022046;
	}
	private double MilesToKilometers (double Miles){
		return Miles/0.62137;
	}
	private double KilometersToMiles (double Kilometers){
		return Kilometers*0.62137;
	}
	
	
	
}
	
	
