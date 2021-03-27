using System;
using System.IO;
using System.Net.Http;
using System.Text.Json;
using System.Text;
using System.Diagnostics;

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
            
            //await GetHttpResult();

            //StartSubProcess();

            await StatusToWebsite("http://suricate.axdesign.fr/data.php");
        }

        static DateTime GetFolderDate(string folderPath)
        {
            DateTime creation = File.GetCreationTime(folderPath);
            return creation;
        }

        static void StartSubProcess()
        {
            Process process = new Process();
            // Configure the process using the StartInfo properties.
            process.StartInfo.FileName = "cmd.exe";
            process.StartInfo.Arguments = "-n";
            process.StartInfo.WindowStyle = ProcessWindowStyle.Normal;
            ProcessStartInfo processStartInfo = new ProcessStartInfo();
            processStartInfo.RedirectStandardOutput = true;
            processStartInfo.RedirectStandardError = true;
            process.StartInfo = processStartInfo;
            process.Start();
            process.WaitForExit();// Waits here for the process to exit.
        }


        static async System.Threading.Tasks.Task StatusToWebsite(String websiteUrl)
        {
            Console.WriteLine("Sending status info to " + websiteUrl);

            object data = new
            {
                cn = System.Environment.MachineName,
                fcn = System.Net.Dns.GetHostName(),
                d = DateTime.Now,
                utc = DateTime.UtcNow,
                key = "ff31035979b231cfca404bc4494152c705840804fb9bbe0de3c55c6453b3e174",
                v=1,
                s = new {
                    setupD = GetFolderDate(@"C:\Program Files\Internet Explorer")
                }
            };

            var json = JsonSerializer.Serialize(data);
            var stringContent = new StringContent(json, UnicodeEncoding.UTF8, "application/json");
            HttpResponseMessage response = await http.PostAsync(websiteUrl, stringContent);
            response.EnsureSuccessStatusCode();
            string responseBody = await response.Content.ReadAsStringAsync();
            Console.WriteLine(responseBody);

            /**
            TODO : completer avec une récupération de la clé pour la sauver en local */

            StatusResult jsonResult = JsonSerializer.Deserialize<StatusResult>(responseBody);
            Console.WriteLine("Status code : "+jsonResult.statusCode);
            Console.WriteLine("Status result : "+jsonResult.statusMessage);
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

            /**
            TODO : completer avec une récupération de la clé pour la sauver en local

            var jsonResult = JsonSerializer.Deserialize<WeatherForecast>(responseBody);
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
