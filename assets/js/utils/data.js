const request = async (url) => {
    const response = await fetch(url,{
        method: 'POST'
    })
    if (!response.ok)
        throw new Error("WARNING", response.status)
    const data = await response.json()
    localStorage.setItem('productContainer', JSON.stringify(data))
    return data
}
export { request }