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

        //static async System.Threading.Tasks.Task Main(string[] args)
        static void Main(string[] args)
        {
            // if (args.Length != 0)
            // {
            //     if ("register".Equals(args[0]))
            //     {
            //         await RegisterToWebsite(args[1]);
            //     }
            //     else
            //     {
            //         Console.WriteLine("Paramètre inconnu !");
            //     }
            // }
           // await StatusToWebsite("http://suricate.axdesign.fr/data.php");
        }

        static DateTime GetFolderDate(string folderPath)
        {
            DateTime creation = File.GetCreationTime(folderPath);
            return creation;
        }

        static string GetSubProcessResult(string commande)
        {
            Process process = new Process();
            process.StartInfo.FileName = "cmd.exe";
            
            process.StartInfo.Arguments = "/C " + commande;
            process.StartInfo.WindowStyle = ProcessWindowStyle.Normal;
            process.StartInfo.UseShellExecute = false;
            process.StartInfo.RedirectStandardOutput = true;
            process.Start();

            StreamReader reader = process.StandardOutput;
            string output = reader.ReadToEnd();

            process.WaitForExit();
            int index = output.IndexOf(":");
            output = output.Substring(index+1).Trim();

            return output;

        }


        static async System.Threading.Tasks.Task StatusToWebsite(String websiteUrl)
        {
            Console.WriteLine("Sending status info to " + websiteUrl);

            object data = new
            {
                cn = System.Environment.MachineName,
                d = DateTime.Now,
                utc = DateTime.UtcNow,
                key = "ff31035979b231cfca404bc4494152c705840804fb9bbe0de3c55c6453b3e174",
                v=1,
                s = new {
                    ieFolderD = GetFolderDate(@"C:\Program Files\Internet Explorer"),
                    setupD = GetSubProcessResult("systeminfo | find /i \"installation\""),
                    startD = GetSubProcessResult("systeminfo | find /i \"démarrage\"")
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

    }
}
