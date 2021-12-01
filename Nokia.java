package designpattern;

import java.util.Scanner;


public class Nokia extends CellPhone{
	Scanner sc=new Scanner(System.in);
	public void menu() {
		System.out.println();
		System.out.println("1.mms\n2.sms\n3.Phone Dial\n4.About");
		System.out.println();
		System.out.print("enter your choice[1-4]:");
		int choice=sc.nextInt();
	
		
		switch(choice) {
		case 1:
			this.mms();
			break;
		case 2:
			this.sms();
			break;
		case 3:
			this.phoneDial();
			break;
		case 4:
			this.about();
			break;
		
		default:
			System.out.println("You have entered wrong choice,"
					+ "Plsease enter valid choice");
		}


	}
	public void about() {
		System.out.println();
		System.out.println("Device: Nokia(105)\nDisplay:1.80-inch"
				+ "\nProcessor: one-core\nFront Camera:No\nRear Camera:No\n"
				+ "Sim: single sim\nRAM: 4MB\nStorage :4MB\nBattery: 800mAh");
	}


}
