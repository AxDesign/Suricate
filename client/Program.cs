using System;
using System.IO;
using System.Net.Http;
using System.Text.Json;
using System.Text;


namespace client
{
    class Program
    {
        static readonly HttpClient http = new HttpClient();

        static async System.Threading.Tasks.Task Main(string[] args)
        {
            if (args.Length != 0)
            {
                if ("register".Equals(args[0]))
                {
                    await RegisterToWebsite(args[1]);
                }
                else
                {
                    Console.WriteLine("Paramètre inconnu !");
                }
            }


            DisplayFolderDate(@"C:\Program Files\Internet Explorer");
            await GetHttpResult();
        }

        static void DisplayFolderDate(string folderPath)
        {
            DateTime creation = File.GetCreationTime(folderPath);
            Console.WriteLine(creation);
        }

        static async System.Threading.Tasks.Task RegisterToWebsite(String websiteUrl)
        {
            Console.WriteLine("Enregistrement sur le site web " + websiteUrl);
            Console.WriteLine("Veuillez saisir votre login :");
            var loginStr = Console.ReadLine();
            Console.WriteLine("Veuillez saisir votre mot de passe :");
            var passwordStr = Console.ReadLine();

            object data = new
            {
                login = loginStr,
                password = passwordStr,
                computerName = System.Environment.MachineName,
                fullComputerName = System.Net.Dns.GetHostName()
            };

            var json = JsonSerializer.Serialize(data);
            var stringContent = new StringContent(json, UnicodeEncoding.UTF8, "application/json"); // use MediaTypeNames.Application.Json in Core 3.0+ and Standard 2.1+
            HttpResponseMessage response = await http.PostAsync(websiteUrl, stringContent);
            //string responseBody = await http.PostAsync(websiteUrl, content).Result;
            response.EnsureSuccessStatusCode();
            string responseBody = await response.Content.ReadAsStringAsync();
            Console.WriteLine(responseBody);

            /*var jsonResult = JsonSerializer.Deserialize<WeatherForecast>(responseBody);
            var toto = jsonResult.toto;*/

        }

        static async System.Threading.Tasks.Task GetHttpResult()
        {
            try
            {
                /*HttpResponseMessage response = await http.GetAsync("http://www.contoso.com/"); // ou PutSync ou PatchAsync pour Put et Post http methods !!!
                response.EnsureSuccessStatusCode();
                string responseBody = await response.Content.ReadAsStringAsync();*/
                // Above three lines can be replaced with new helper method below
                string responseBody = await http.GetStringAsync("http://www.contoso.com/");
                Console.WriteLine(responseBody);
            }
            catch (HttpRequestException e)
            {
                Console.WriteLine("\nException Caught!");
                Console.WriteLine("Message :{0} ", e.Message);
            }


        }
    }
}
