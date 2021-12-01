package designpattern;

import java.util.Scanner;

public class OPPO extends CellPhone{
	Scanner sc=new Scanner(System.in);
	public void menu() {
		System.out.println();
		System.out.println("1.mms\n2.sms\n3.Phone Dial\n4.Paytm\n5.About");
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
		System.out.println("Device: Oppo A54\nScreen Size: 6.5 inches\n"
				+ "Sim Slot: Dual\nStorage Capacity: 64 GB, 128 GB\n"
				+ "Operating System: Android\nFront Camera Resolution: 16 MP\n"
				+ "Rear Camera Resolution: 48 MP\nRAM: 4 GB\n"
				+ "Security: FingerPrint Scanner\nSim Card Size: Nano");
		
	}


}
