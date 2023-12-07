using Microsoft.AspNetCore.Mvc;

namespace MultimediaLibrary.Controllers;

[ApiController]
[Route("[controller]")]
public class ImageController : ControllerBase
{
    [HttpGet(Name = "GetImages")]
    public List<string> Get()
    {
        var dir = "..\\..\\img";
        var imageFiles = Directory.GetFiles(dir, "*.jpg"); // Change the file extension based on your image types
        var imageIds = Directory.GetFiles(dir)
            .Select(Path.GetFileNameWithoutExtension)
            .Select(fileName => fileName.Substring(0, fileName.LastIndexOf('_')))
            .Distinct()
            .ToList();
        foreach (var imageId in imageIds)
        {
            Console.WriteLine($"{imageId}");
        }
        return imageIds;
    }

    //[HttpGet(Name = "GetImage")]
    //public Image Get()
    //{

    //}
}
