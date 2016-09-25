import java.io.PrintWriter;
import java.io.File;
import java.io.IOException;

class RecursiveFileDisplay {
	public static int totalJPG=0;
	
	public static int totalSQL=0;

	public static int totalPDF=0;
	public static int totalMP3=0;

	
	public static void main(String[] args) {
		
		try{
		PrintWriter writer = new PrintWriter("c:/Data.html", "UTF-16");
		writer.println("<html><head><title>File Scanned..</title></head><body>");
		File currentDir = new File("."); // current directory
		displayDirectoryContents(currentDir,writer);
		System.out.println("Total JPG:"+" ==>>  " +totalJPG);
		System.out.println("Total PDF:"+" ==>>  " +totalPDF);
		System.out.println("Total MP3 :"+" ==>>  " +totalMP3);
		System.out.println("Total SQL Files:"+" ==>>  " +totalSQL);
		writer.println("</body></html>");
		writer.close();
		}catch(Exception e)
		{
			e.printStackTrace();
		}
		
	}

	public static void displayDirectoryContents(File dir,PrintWriter writer) {
		try {
			
			File[] files = dir.listFiles();
			for (File file : files) {
				if (file.isDirectory()) {
					writer.println("Directory: "+file.getCanonicalPath()+"  ");
					//	System.out.println("directory:" + file.getCanonicalPath());
					displayDirectoryContents(file,writer);
				} else {
					String fileName=file.getName();
					if(fileName.substring(fileName.lastIndexOf('.') > 0 ? fileName.lastIndexOf('.') + 1: 0).equalsIgnoreCase("JPG") )
						totalJPG++;
					else if(fileName.substring(fileName.lastIndexOf('.') > 0 ? fileName.lastIndexOf('.') + 1: 0).equalsIgnoreCase("SQL") )
						totalSQL++;
					else if(fileName.substring(fileName.lastIndexOf('.') > 0 ? fileName.lastIndexOf('.') + 1: 0).equalsIgnoreCase("MP3") )
							totalMP3++;
					else if(fileName.substring(fileName.lastIndexOf('.') > 0 ? fileName.lastIndexOf('.') + 1: 0).equalsIgnoreCase("PDF") )
							totalPDF++;
					writer.println("<a href=\""+file.getCanonicalPath()+"\" >"+file.getName()+"</a><br>");
					//		System.out.println("     file:" + file.getCanonicalPath());
					
				}
			
			}
					
		} catch (IOException e) {
			
			e.printStackTrace();
		}
	}

}