package designpattern;

import java.util.Scanner;


public class Apple extends CellPhone{
	Scanner sc=new Scanner(System.in);
	public void menu() {
		System.out.println();
		System.out.println("1.mms\n2.sms\n3.Phone Dial\n4.Apple Pay\n5.About");
		System.out.println();
		System.out.print("enter your choice[1-5]:");
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
			PayApp pay=PayApp.getObject();
			pay.payApp();
			break;	
		case 5:
			this.about();
			break;
		
		default:
			System.out.println("You have entered wrong choice,"
					+ "Plsease enter valid choice");
		}


	}
	
	public void about() {
		System.out.println("Device: Apple iphone 11 Pro Max\nScreen size: 6.5 inches\n"
				+ "Display Resolution: 2688 X 1242\nStorage Capacity: 64 GB, 256 GB,512 GB\n"
				+ "Sim Slot: Dual Sim\nFront Camera Resolution: 12 MP\n"
				+ "Operating System: iOS\nBody Material: Glass, Stainless Steel\n"
				+ "Battery Capacity: 3969 mAh");
	}

}
