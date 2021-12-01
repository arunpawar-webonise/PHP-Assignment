package designpattern;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.Scanner;

public class Samsung extends CellPhone{
	Scanner sc=new Scanner(System.in);
	public void menu() {
		System.out.println();
		System.out.println("1.mms\n2.sms\n3.Phone Dial\n4.Samsung Pay\n5.About");
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
		System.out.println("Device:Samsung Galaxy S20\nDisplay:6.2 inches"
				+ "\nSim:Dual Sim\nProcessor:Exynos 990 (7 nm+)\nRam:8GB"
				+ "\nStorage:128GB"
				+ "\nFron Camera:12 MP + 64 MP + 12 MP Camera with LED"
				+ "\nBattery:Non-removalable Li-ion 4000 mAh battery");

	}

}
